import * as $ from 'jquery'
import axios from 'axios';
import Swal from 'sweetalert2';
import { UTIL } from './util.js';
import { VALIDATION } from './validation.js';

export const FORM = {
    init : () => {
        FORM.bindEvents();
    },
    bindEvents : () => {
        FORM.handleResetForm();
        VALIDATION.handleDecimalInputs();
    },
    getHtmlForm : (disabledInputs) => {
        $(UTIL.getSelectorNames(disabledInputs)).attr('disabled', true);
        return $('#form').children().map(function() {
            return this.outerHTML;
        }).get().join('');
    },
    populateForm : (formData) => Object.keys(formData).map((key) => $('[name="' + key + '"]').val(formData[key])),
    getModalSettings : (formData) => {
        formData = (typeof formData === 'object') ? formData : {};
        const isEdit = (Object.keys(formData).length > 0);
        const disabledInputs = (isEdit === true) ? ['name'] : [];

        return {
            title             : (isEdit === true ? 'Edit' : 'Add') + ' a Kangaroo',
            html              : FORM.getHtmlForm(disabledInputs),
            focusConfirm      : true,
            showCancelButton  : true,
            showCloseButton   : true,
            allowOutsideClick : false,
            confirmButtonText : 'Save',
            buttonsStyling    : false,
            customClass       : {
                confirmButton : 'btn btn-primary btn-sm btn-confirm',
                cancelButton  : 'btn btn-secondary btn-sm'
            },
            didOpen           : () => {
                FORM.populateForm(formData);
            },
            didClose          : () => FORM.handleResetDisabledInputs(),
        }
    },
    handleOpenForm : (formData) => {
        return Swal.mixin({
            preConfirm : () => VALIDATION.doValidation(UTIL.getFormData(true)),
        }).fire(FORM.getModalSettings(formData)).then((result) => FORM.handlePostResult(result));
    },
    handleResetForm : () => $('body').on('change', '.form-data', (e) => {
        Swal.resetValidationMessage();
        VALIDATION.resetHighlightErrorFields();
    }),
    handleResetDisabledInputs : () => $('.form-data').each((i,e) => $(e).attr('disabled', false)),
    handleSubmit : (data) => {
        axios.post('/data', data)
            .then(({status}) => FORM.handleResponseAlert(status === 200, 'success', 'Saved!'))
            .catch(({response}) => {
                const message = typeof response.data === 'object' ? response.data.join('') : 'Error!'
                FORM.handleResponseAlert(false, 'error', message);
        })
    },
    handlePostResult : (result) => result.isConfirmed ? FORM.handleSubmit(UTIL.getFormData()) : VALIDATION.resetHighlightErrorFields(),
    handleResponseAlert : (isSuccess, icon, message) => Swal.fire({
        title             : message,
        icon              : icon,
        showConfirmButton : false,
        timer             : 2000
    }).then(() => (isSuccess === true && window.location.reload()))
};
