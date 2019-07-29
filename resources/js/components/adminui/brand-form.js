import React, {Component} from 'react';
import { connect } from 'react-redux';
import {_CREATE_BRAND} from "../../actions/index";

const dataInitial = {
    edit: false,
    checked: false,
    selectedFile: null,
    data: { name: "", comment: "" }
};




class BrandForm extends Component {

    constructor(props) {
        super(props)
        this.state = {
            edit: false,
            checked: false,
            data: {
                name: '',
                comment: '',
                selectedFile: null,

            }
        };
    }



   


    /**
     * When component receive props 
     * we set the state
     */
    componentWillReceiveProps(nextProps) {

        console.log('props-currentBrand', this.props.currentBrand)

        if (nextProps.currentBrand !== this.props.currentBrand) {
            
            let { name, comment } = nextProps.currentBrand

            this.setState({
                edit: true,
                checked: true,
                data: {
                    ...this.state.data,
                    name,
                    comment,
                }
            })
        }
    }





    /**
     * Change value onChange
     * this.state({ data:{...this.state.data, [XX]:YY } })
     */
    handleOnChange = e => {
        this.setState({
            data: {
                ...this.state.data,
                [e.target.name]: e.target.value
                
            }
        })
    }


    /**
     * SetState just for file input 
     */
    fileSelect = e => {
       // this.setState({ selectedFile: e.target.files[0] })
        this.setState({
            data: {
                ...this.state.data,
                selectedFile: e.target.files[0]
            }
        });
        console.log(e.target.files[0])
    }



    /**
     * Sudmit data with action store
     * to /api.
     * we have to meth: onCreateBrand and onEditBrand
     */
    handleOnSubmit = e => {
        e.preventDefault();

        if (!this.state.edit) {
            this.onCreateBrand()
        } else {
            console.log("edit THIS br action");
        }

    }



    /**
     * Delete this Cat
     * when state edit/checked it true
     */
    handleDelete = e => {
        e.preventDefault();
        if (this.state.checked) {
            console.log('Deleted action ')
        } else {
            //show err like on front
        }
    }





    /**
     * Meth.
     * onCreateBrand
     */
    onCreateBrand(){
        let { name, comment, selectedFile } = this.state.data;

        const fd = new FormData();
        selectedFile
            ? fd.append('file', selectedFile, selectedFile.name)
            : fd.append('file', '')
        fd.append('name', name);
        fd.append('comment', comment);

        //action redux: send data and clear form if successfully
        this.props._CREATE_BRAND(fd).then((res) => {
            if (res === 'success') { this.setState(dataInitial) }

        });
    }




    render() {

        let { name, comment } = this.state.data;


        let classNameBtn = this.state.edit ? 'danger' : 'default'



        return (
            <div className="card card-small h-100">
                <div className="card-header border-bottom">
                    <h6 className="m-0"> Formulaire fournisseur</h6>
                </div>

                <div className="card-body d-flex flex-column">
                    <form className="quick-post-form" id="form-brand" onSubmit={e => this.handleOnSubmit(e)}>

                        <div className="form-group">
                            <input
                                type="text"
                                className="form-control"
                                placeholder="Nom de l'equipementier "
                                name="name"
                                value={name}
                                onChange={ this.handleOnChange} />
                        </div>

                        <div className="form-group">
                            <textarea
                                className="form-control"
                                placeholder="Description détaillée de l'equipementier"
                                name="comment"
                                value={comment}
                                onChange={this.handleOnChange}
                            />
                        </div>

                        <input type="file" onChange={this.fileSelect} />


                        <div className="form-group" />

                        <div className="form-group mb-0">
                            <button
                                type="submit"
                                className="btn btn-accent" >
                                VALIDER
                            </button>

                            <button
                                type="submit"
                                className={`btn btn-${classNameBtn} float-right `}
                                onClick={e => this.handleDelete(e)} >
                                SUPPRIMER
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        );
    }
}


/**
 * CurrentBrand is filled on store 
 * when we clicked on brand list
 */
const mapStateToProps = state => ({
   // currentBrand: state.filterDataArticleList.currentBrand ? state.filterDataArticleList.currentBrand : null
});


export default  connect(mapStateToProps, {_CREATE_BRAND})(BrandForm);