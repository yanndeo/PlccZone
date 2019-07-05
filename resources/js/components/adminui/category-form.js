import React, { Component, PropTypes } from 'react'
import { connect } from 'react-redux';

class CategoryForm extends Component {


    state={
        edit:false,
        checked:false,
        data:{
            title:'',
            description:'',
            imagePath:''
        }
    }


    /**
     * When component receive props 
     * we set the state
     */
    componentWillReceiveProps(nextProps) {
        if (nextProps.currentCategory !== this.props.currentCategory) {
            //console.log('nextProps', nextProps.currentCategory)

            let { title, description, imagePath } = nextProps.currentCategory

            this.setState({
                edit:true,
                checked:true,
                data:{
                    ...this.state.data,
                    title,
                    description,
                    imagePath
                }
            })
        }
    } 





    /**
     * Change value onChange
     * this.state({ data:{...this.state.date, [XX]:YY } })
     */
     handleOnChange =(e)=>{
          this.setState({
               data:{
                 ...this.state.data,
                 [e.target.name]: e.target.value 
               } 
            }) 
    }



    /**
     * Dele this Cat 
     * when state edit/checked it true
     */

     handleDelete= e =>{
         e.preventDefault()

        if(this.state.checked){
            console.log('Deleted action ')
        }else{
            //show err like on front
        }
     }


    /**
     * Sudmit data with action store
     * to /api
     */
    handleOnSubmit = e => {
        e.preventDefault();
        if(!this.state.edit){
            console.log('save new cat action')
        }else{
            console.log("edit THIS cat action");

        }

    }

  


    

    render () {

        let { title, description , imagePath } = this.state.data;

        let classNameBtn = this.state.edit ? 'danger' : 'default'

        return (
            <div className="card card-small h-100">
                <div className="card-header border-bottom">
                    <h6 className="m-0"> Formulaire Categorie</h6>
                </div>

                <div className="card-body d-flex flex-column">

                    <form className="quick-post-form" onSubmit={ e=> this.handleOnSubmit(e)}>
                        <div className="form-group">
                            <input
                                type="text"
                                className="form-control"
                                id="exampleInputEmail1"
                                placeholder="Nom de la categorie"
                                name="title"
                                value={title}
                                onChange={e => this.handleOnChange(e)}
                            />
                        </div>

                        <div className="form-group">
                            <textarea
                                className="form-control"
                                placeholder="Description explicite de la categorie..."
                                name="description"
                                value={description}
                                onChange={e => this.handleOnChange(e)}
                            />
                        </div>

                        <div className="form-group mb-0">
                            <button
                                type="submit"
                                className="btn btn-accent">
                                VALIDER
                            </button>

                            <button
                                type="submit"
                                className={`btn btn-${classNameBtn} float-right `} 
                                onClick= {e=> this.handleDelete(e)} >
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
 * CurrentCategory is filled on store 
 * when we clicked on category list
 */
const mapStateToProps = state => ({
    currentCategory: state.filterDataArticleList.currentCategory ? state.filterDataArticleList.currentCategory : null  
});


export default  connect(mapStateToProps, {})(CategoryForm)