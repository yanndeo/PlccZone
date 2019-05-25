import React, {Component} from 'react';
import {BootstrapTable, TableHeaderColumn} from 'react-bootstrap-table';
import {STYLEBTN } from '../data/btnColor'


class DataTable extends Component {

    constructor (props) {
        super(props)

        this.rowEvent = {
            onClick: (e, row, rowIndex) => {
                // alert(row)

            }
        };

        this.selectRow = {
            mode: 'radio',
            bgColor: 'orange',
            hideSelectColumn: true,
            clickToSelect: true  ,
            onSelect: (row, isSelect, rowIndex, e) => {
                console.log( row.id);
            }
        };

    }
    //END CONSTRUCTOR
 

    render() {

        var products = this.props.articles

        /* OPTIONS */
        const options = {
            page: 1,
            sizePerPage: 14,
            onRowClick: function(row, rowIndex, columnIndex, event){
               // console.log(row)
            }
        };


        /* Personnalisation d'un champs */

        function colFormatter(cell, row){
           // console.log(row)
            return (
                <span>
                    <a href={`/article/${row.slug}-${row.id}`} style={{textDecoration:'none', color:'grey'}}> {cell} </a>
                </span>
            )
        }


        function priceFormatter(cell, row){
            return  brand.name ;
        }

        function truncateText(cell, row){
              description.substring(0, 13)
        }



        return (
            <BootstrapTable data={products} striped hover
                            options ={options}
                            headerStyle={ STYLEBTN }
                            pagination={ true }
                            search={ true }
                            multiColumnSearch={ true }
                            selectRow={this.selectRow }
                            rowEvents={this.rowEvent}>

                <TableHeaderColumn isKey dataField='reference' dataFormat={colFormatter}  >REFERENCE. </TableHeaderColumn>

                <TableHeaderColumn dataField='name' dataFormat={colFormatter} > ARTICLE </TableHeaderColumn>

                <TableHeaderColumn dataField='brand_name' dataFormat={colFormatter} > FABRICANT </TableHeaderColumn>

                <TableHeaderColumn dataField='category_title' dataFormat={colFormatter}  >CATEGORIE</TableHeaderColumn>

            </BootstrapTable>
        );
    }
}


export default DataTable
