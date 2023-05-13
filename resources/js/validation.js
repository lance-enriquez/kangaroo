import * as $ from 'jquery';
import Swal from 'sweetalert2';
import { UTIL } from './util.js';

export const VALIDATION = {
    doValidation : (rawFormData) => {
        const errorKeys = VALIDATION.getErrorMessages(rawFormData, false);
        if (errorKeys.length > 0) {
            const errorMessages = VALIDATION.getErrorMessages(rawFormData, true);
            VALIDATION.showHighlightErrorFields(errorKeys);
            Swal.showValidationMessage(VALIDATION.buildErrorMessageHtml(errorMessages));
        }
        return UTIL.getFormData();
    },
    getErrorMessages : (rawFormData, isMessage) => {
        const errors = [];
        Object.keys(rawFormData).map((item) => {
            const element = rawFormData[item];
            const isEmpty = (element.value === null || element.value.trim().length === 0);
            const isNotDecimal = (element.type === 'number' && VALIDATION.validateDecimal(element.value) === false);
            if (element.required === true && (isEmpty === true || isNotDecimal === true)) {
                const data = (isMessage === true) ? rawFormData[item].name : item;
                errors.push(data);
            }
        });
        return errors;
    },
    buildErrorMessageHtml : (errorMessages) => {
        const messages = [];
        errorMessages.forEach((message) => messages.push(message + ','));
        const message = messages.join('').replace(/.$/,'');
        return [message, 'is invalid.'].join(' ');
    },
    showHighlightErrorFields : (errorMessages) => {
        errorMessages.forEach((key) => $('[name="' + key + '"]').addClass('is-invalid'));
    },
    resetHighlightErrorFields : () => {
        $('.form-data').each((index, element) => $(element).removeClass('is-invalid'));
    },
    validateDecimal : (value) => {
        return (/^\d+\.\d{2}$/.test(value));
    },
    handleDecimalInputs : () => {
        $('body').on('keyup change', '[type="number"]', (element) => {
            const input = element.target;
            const value = parseFloat(input.value).toFixed(2);
            if (element.type === 'change') {
                const status = !(value !== 'NaN' && value > 0 && $(input).val(value));
                $(input).toggleClass('is-invalid', status);
            }
        })
    },
};
