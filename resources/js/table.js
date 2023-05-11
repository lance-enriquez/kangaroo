import { FORM } from './form.js';
import { UTIL } from './util.js';

export const TABLE = {
    getTableProperties : {
        dataSource : {
            store : {
                type : 'odata',
                url  : '/data'
            },
        },
        toolbar : {
            items : [
                {
                    location : 'before',
                    widget   : 'dxButton',
                    options  : {
                        icon    : 'add',
                        text    : 'Add a Kangaroo',
                        onClick : () => FORM.handleOpenForm()
                    },
                },
                'searchPanel'
            ]
        },
        onCellClick : ({rowType, data}) => (rowType === 'data' && FORM.handleOpenForm(data)),
        paging : {
            pageSize : 10,
        },
        pager : {
            showPageSizeSelector : true,
            allowedPageSizes : [10, 25, 50, 100],
        },
        remoteOperations : false,
        searchPanel : {
            visible                : true,
            highlightCaseSensitive : true,
        },
        groupPanel : {
            visible : false
        },
        grouping : {
            autoExpandAll : true,
        },
        allowColumnReordering : true,
        rowAlternationEnabled : true,
        showBorders : true,
        columns : [
            {
                dataField : 'name',
                caption   : 'Name',
                dataType  : 'string',
                format    : 'text',
                alignment : 'left',
                width     : '54%',
            },
            {
                dataField : 'birth_date',
                caption   : 'Birth Date',
                dataType  : 'string',
                format    : 'Date',
                alignment : 'center',
                width     : '10%',
            },
            {
                dataField : 'weight',
                caption   : 'Weight',
                dataType  : 'string',
                format    : 'decimal',
                alignment : 'center',
                width     : '8%',
            },
            {
                dataField : 'height',
                caption   : 'Height',
                dataType  : 'string',
                format    : 'decimal',
                alignment : 'center',
                width     : '8%',
            },
            {
                dataField : 'is_friendly',
                caption   : 'Friendliness',
                dataType  : 'number',
                alignment : 'center',
                width     : '10%',
                format    : (value) => UTIL.trueValues.includes(value) ? 'Friendly' : 'Not Friendly',
            },
        ]
    }
};
