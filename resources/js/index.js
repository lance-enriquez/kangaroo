import { FORM } from './form.js';
import { TABLE } from './table.js';

$(document).ready(() => {
    $('#gridContainer').dxDataGrid(TABLE.getTableProperties);
    FORM.init();
});
