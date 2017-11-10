 $(document).ready(function () {
     // alert('asda');
        jQuery("#tabla").jqGrid({
            url: 'listar',
            datatype: 'json', mtype: 'GET',
            height: 'auto', autowidth: true,
            toolbarfilter: true,
            colNames: ['FEC_NAC', 'SEXO', 'NRO. DOC','TIP_DOC', 'RAZ_SOC', 'NOMBRE', 'APATERNO', 'AMATERNO', 'CONTRIBUYENTE'],
            rowNum: 20, sortname: 'id_pers', sortorder: 'asc', viewrecords: true, caption: 'VISTA CONTRIBUYENTES', align: "center",
            colModel: [
                // {name: 'id_contrib', index: 'id_contrib',align: 'center', width: 30 },
                // {name: 'id_pers', index: 'id_pers',align: 'center', width: 30 },
                {name: 'pers_fnac', index: 'pers_fnac',align: 'center', width: 30 },
                {name: 'pers_sexo', index: 'pers_sexo',align: 'center', width: 30 },
                {name: 'pers_nro_doc', index: 'pers_nro_doc', align: 'center', width: 80},
                {name: 'pers_tip_doc', index: 'pers_tip_doc', align: 'center', width: 80},   
                {name: 'pers_raz_soc', index: 'pers_raz_soc', align: 'center', width: 80},   
                {name: 'pers_nombres', index: 'pers_nombres', align: 'center', width: 80},               
                {name: 'pers_ape_mat', index: 'pers_ape_mat', align: 'center', width: 80},
                {name: 'pers_ape_pat', index: 'pers_ape_pat', align: 'center', width: 80},   
                {name: 'contribuyente', index: 'contribuyente', align: 'center', width: 80}
            ],            
            rowList: [20, 20],       
            pager: 'paginador',
            ondblClickRow: function(row_id) {

            // alert($(this).jqGrid('getCell', row_id, 'pers_fnac'));
            // $(this).jqGrid('getCell', row_id, 'pers_fnac');
            document.location.href = "/editar/" + row_id;
            
        },
        }).navGrid('#paginador', { view: false, del: false, add: false, edit: false },
                {},//opciones edit
                {}, //opciones add
                {}, //opciones del
                {multipleSearch:true,closeAfterSearch: true, closeOnEscape: true}//opciones search
            ).jqGrid("filterToolbar");

});

  function getSelectedRow() {
            var grid = $("#tabla");
            var rowKey = grid.getGridParam("selrow");

            if (rowKey)
                document.location.href = "/eliminar/" + rowKey;
            else
                alert("Debes Seleccionar una Columna para poder eliminar una persona");
        }