import React, { Component, Fragment } from 'react'
import ReactDOM from "react-dom";
//Action
import { _ASKED_DEVIS } from '../../actions';
//Utils
import { ShowNotification } from "../utils/notification";
//Components
import ReCaptchaComponent from "./reCaptcha";


const dataInitial = {
        namepb: "",
        fullname: "",
        entreprise: "",
        email: "",
        qte: "",
        tel: "",
        message: ""
};

class DevisForm extends Component {

    constructor(props) {
        super(props);

        this.state = {
            formData: {
                namepb: "",
                fullname: "",
                entreprise: "",
                email: "",
                qte: "",
                tel: "",
                message: ""
            },

            isloading: false,
            isVerified: false,
            errors: [],
        };
    }



    /**
     * apres le rendu de la page
     * rempli dejà le champs caché 
     * avec le nom de l'article 
     */
    componentDidMount() {
        const { namepb } = this.props;
        this.setState({
            formData: { ...this.state.formData, namepb }
        });
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
     *  handleVerifyCallback & handleOnloadCallback
     *  Callback function
     */

    handleOnloadCallback = (recaptcha_loaded) => {
        console.log('recaptch-in-devis-form-loaded', recaptcha_loaded)

        this.setState({ isloading: recaptcha_loaded })
    }

    handleVerifyCallback=(recaptcha_value)=>{
        console.log('recaptch-in-devis-form-verified', recaptcha_value)

        this.setState({ isVerified: recaptcha_value})
    }


    

    /**
     * Send all datas using _ASKED_DEVIS() function 
     * in actions file
     */
    handleSubmit = async (e) => {

        //Don't reload me page please
        e.preventDefault(); 

        if(this.state.isloading){

             //Check if capctha is true and load
            if (this.state.isVerified) {

                const formData = this.state.formData;
                console.log("state", formData);

                _ASKED_DEVIS(formData)
                    .then(response => {
                         console.log('to_front', response.status )

                        if(response.status === 200){

                            ShowNotification("success", "Message envoyé.Merci pour votre confiance ");
                            this.setState({ formData : dataInitial})
                        }

                        if(response.status === 422){
                            
                            console.log('gestion_derreur', response.data.errors)
                            this.setState({ errors: response.data.errors })
                        }


                        if(response.status === 500){

                            ShowNotification("warning", "Contactez l'administrateur ");
                            this.setState({ formData : dataInitial})
                        }

                }).catch( (error)=>{
                    console.log('err_front', error)

                })



            } else {
                ShowNotification("error", "Please verify that you are a human!  ");
            }
        }

        
    };


    /**
     * 
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
        const { fullname, entreprise,email, qte, tel, message } = this.state.formData;

        return (
            <Fragment>
                <h4>Demander votre devis concernant cet article </h4>

                {this.renderErrorAlert()}
              
                <form
                    className="row contact_form"
                    id="contactForm"
                    noValidate="novalidate"
                    onSubmit={e => this.handleSubmit(e)}>
                    
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                className={`form-control ${this.hasErrorFor('fullname') ? 'is-invalid' : ''}`}
                                id="name"
                                name="fullname"
                                placeholder="Mr/Mme XXX "
                                value={fullname}
                                onChange={e =>this.handleFieldChange(e)  }
                                required
                            />
                            {this.renderErrorFor('fullname')}

                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                className={`form-control ${this.hasErrorFor('entreprise') ? 'is-invalid' : ''}`}
                                id="entreprise"
                                name="entreprise"
                                placeholder="Nom de votre entreprise "
                                value={entreprise}
                                onChange={e =>this.handleFieldChange(e)}
                            />
                            {this.renderErrorFor('entreprise')}

                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="email"
                                className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
                                id="email"
                                name="email"
                                placeholder="Email Address"
                                value={email}
                                onChange={e => this.handleFieldChange(e)}
                                required
                            />
                            {this.renderErrorFor('email')}

                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="number"
                                className="form-control"
                                id="qte"
                                name="qte"
                                min="1"
                                placeholder="Quantité"
                                value={qte}
                                onChange={e => this.handleFieldChange(e) }
                            />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                className={`form-control ${this.hasErrorFor('tel') ? 'is-invalid' : ''}`}                                
                                id="tel"
                                name="tel"
                                placeholder="Telephone"
                                value={tel}
                                onChange={e =>this.handleFieldChange(e) }
                            />
                            {this.renderErrorFor('tel')}

                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <textarea
                                className={`form-control ${this.hasErrorFor('message') ? 'is-invalid' : ''}`}                                
                                name="message"
                                id="message"
                                rows="1"
                                placeholder="Message"
                                value={message}
                                onChange={e => this.handleFieldChange(e)}
                            />
                            {this.renderErrorFor('message')}

                        </div>
                    </div>

                    <div className="col-md-12">
                        <ReCaptchaComponent
                            handleOnloadCallback={ this.handleOnloadCallback }
                            handleVerifyCallback={ this.handleVerifyCallback }
                        />
                    </div>

                    <div className="col-md-12 text-right">
                        <button
                            type="submit"
                            className="btn btn-block primary-btn">
                            DEMANDER VOTRE DEVIS
                        </button>
                    </div>
                </form>

            </Fragment>
        );
    }
}

if (document.getElementById('devis_form')) {
    const elmtForm = document.getElementById("devis_form");
    const props = Object.assign({}, elmtForm.dataset);
    console.log(props) //value passer depuis la views html en dataset dans les props du component

    ReactDOM.render(
        <DevisForm {...props} />,
        document.getElementById("devis_form")
    );
}


export default DevisForm

/**
 * La méthode Object.assign() est utilisée afin de copier les valeurs de toutes les propriétés directes 
 * (non héritées) d'un objet qui sont énumérables sur un autre objet cible. Cette méthode renvoie l'objet cible.
 */