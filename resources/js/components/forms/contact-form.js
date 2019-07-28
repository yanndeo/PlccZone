import React, {Component, Fragment} from 'react';
import ReactDOM from "react-dom";
import ReCaptchaComponent from "./reCaptcha";

//Redux
import { Provider } from "react-redux";
import STORE from "../../store/configureStore";
//Action
import { _SENDMAIL } from "../../actions/index";
//Utils
import AlertMessage from "../utils/alertMessage";
import { _setAlert } from '../../actions/alert';



/**
 * Init state
 * call when we want 
 * clear form contact
 */
const dataInitial = {
    name:'',
    email:'',
    subject: '',
    message: '',
}


class ContactForm extends Component {


        state ={
            formData: {
                name:'',
                email:'',
                subject: '',
                message: '',
            },
            isloading: false,
            isVerified: false,
            errors: [],
        }




    /**
     * Send all datas using _SENDMAIL()  
     * from store redux
     * and show errors laravel 422
     * in form
     */
    handleSubmit = async (e) => {

        //Don't reload me page please
        e.preventDefault();

       if (this.state.isloading) {

            //Check if capctha is true and load
            if (this.state.isVerified) {

                const formData = this.state.formData;
                console.log("state", formData);

                           STORE.dispatch(_SENDMAIL(formData))
                                .then(response => {   
                                    console.log('gestion_derreur', response)
      
                                    if (response.status === 422) {
                                        this.setState({ errors: response.data.errors })
                                    }else{
                                        this.setState({ formData: dataInitial })
                                    }

                                }).catch((error) => {
                                    console.log('err_front', error)

                                })



             } else {
                STORE.dispatch(_setAlert("Please verify that you are a human!","warning"))
            }
        } 


    };



  /**
   *  handleVerifyCallback & handleOnloadCallback
   *  Callback function
   */
    handleOnloadCallback = (recaptcha_loaded) => {
        console.log('recaptch-in-devis-form-loaded', recaptcha_loaded)

        this.setState({ isloading: recaptcha_loaded })
    }

    handleVerifyCallback = (recaptcha_value) => {
        console.log('recaptch-in-devis-form-verified', recaptcha_value)

        this.setState({ isVerified: recaptcha_value })
    }



    
    /**
     * Change value of state 
     * when we are filling form's fields
     */
    handleFieldChange = e => {
        this.setState({
            formData: {
                ...this.state.formData,
                [e.target.name]: e.target.value
            }
        });
    };


   /**
    * Gestion d'erreurs
    */
    renderErrorAlert = () => {
        
        if (this.state.errors != '') {
            return (
                <div className="alert alert-danger" role="alert">
                    <ul>
                        <ol>
                            &#8227; Un ou plusieurs champs du formulaire ne sont pas correctement renseignés.
                        </ol>
                    </ul>
                </div>
            )
        }
    }



    
    hasErrorFor(field) {
        return !!this.state.errors[field]
    }




    renderErrorFor(field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className='invalid-feedback'>
                    <strong>{this.state.errors[field][0]}</strong>
                </span>
            )
        }
    }



    render() {

        const { name, email, message, subject } = this.state.formData ;

        return (

            <Fragment>

            { this.renderErrorAlert() }


            <form
                className="row contact_form"
                id="contactForm"
                noValidate="novalidate"
                onSubmit={ e=> this.handleSubmit(e)} >

                <div className="col-md-6">
                    <div className="form-group">
                        <input
                            type="text"
                            className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                            id="name"
                            name="name"
                            value={name}
                            onChange={e => this.handleFieldChange(e)}
                            placeholder="Entrer votre nom" />
                        {this.renderErrorFor('name')}

                    </div>

                    <div className="form-group">
                        <input
                            type="email"
                            className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
                            id="email"
                            name="email"
                            value={email}
                            onChange={e => this.handleFieldChange(e)}
                            placeholder="Entrer votre adresse mail"/>
                        {this.renderErrorFor('email')}

                    </div>

                    <div className="form-group">
                        <input
                            type="text"
                            className={`form-control ${this.hasErrorFor('subject') ? 'is-invalid' : ''}`}                            
                            id="subject"
                            name="subject"
                            value={subject}
                            onChange={e => this.handleFieldChange(e)}
                            placeholder=" A quel sujet ?"/>
                        {this.renderErrorFor('subject')}

                    </div>
                </div>

                <div className="col-md-6">
                    <div className="form-group">
                        <textarea
                            className={`form-control ${this.hasErrorFor('message') ? 'is-invalid' : ''}`}
                            name="message"
                            id="message"
                            rows="1"
                            cols={54}
                            value={message}
                            onChange={e => this.handleFieldChange(e)}
                            placeholder="Votre message" />
                        {this.renderErrorFor('message')}

                    </div>
                </div>

                <div className="col-md-12 text-right">
                       <ReCaptchaComponent
                        handleOnloadCallback={this.handleOnloadCallback}
                        handleVerifyCallback={this.handleVerifyCallback} /> 
                        &nbsp;&nbsp; &nbsp;
                        <button 
                            type="submit" 
                            value="submit"
                            className="primary-btn col-md-6 pull-rigth"
                            style={{ marginTop: -112, width: 394 }}
                            >
                            ENVOYER
                        </button>
                </div>

            </form>
                <AlertMessage />


            </Fragment>

        );
    }
}


if (document.getElementById("contact_form")) {

    console.log("STORE:", STORE.dispatch(_SENDMAIL()));

    ReactDOM.render(
        <Provider store={STORE}>
            <ContactForm />
        </Provider>,
        document.getElementById("contact_form")
    );
}

export default ContactForm;
