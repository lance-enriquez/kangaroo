import * as $ from 'jquery'

export const UTIL = {
    getFormData : (isRaw) => {
        const values = {};
        $('.form-data').map((index, element) => {
            const value = element.value.trim();
            values[element.name] = (isRaw === true) ? {
                value    : (value.length > 0) ? value : null,
                required : element.required,
                name     : element.attributes.placeholder.value,
                type     : element.type
            } : element.value;
        });
        return values;
    },
    getSelectorNames : (keys) => {
        const names = [];
        keys.forEach((element) => {
            names.push('[name="'+ element +'"]');
        });
        return names.join(',').replace(/.$/,'');
    },
    trueValues : [1, '1', true, 'true', 'True', 'T']
};
