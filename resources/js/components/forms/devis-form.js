import React, { Component, Fragment } from 'react'
import ReactDOM from "react-dom";
//Action
import { _ASKED_DEVIS } from '../../actions';
//Utils
import { ShowNotification } from "../utils/notification";
//Components
import ReCaptchaComponent from "./reCaptcha";




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

            loader: true,
            isVerified: false
        };
    }

    componentDidMount() {
        const { namepb } = this.props;
        this.setState({
            formData: { ...this.state.formData, namepb }
        });
    }

    

    //Change value
    handleFieldChange = e => {
        this.setState({
            formData: {
                ...this.state.formData,
                [e.target.name]: e.target.value
            }
        });
    };

    handleVerifyCallback=(recaptcha_value)=>{
        console.log('recaptch-in-devis-form', recaptcha_value)

        this.setState({ isVerified: recaptcha_value})
    }


    handleSubmit = e => {
        e.preventDefault(); //dont reload me page
        //Check if capctha is true and load
        if (this.state.isVerified) {
            const formData = this.state.formData;
            console.log("state", formData);
            //call axios that send data
            //console.log(_ASKED_DEVIS) verifions quelle return une promesse : via fetch ?
            _ASKED_DEVIS(formData).then(() => {
                //Show message ui friendly
            });
        } else {
            ShowNotification("error", "Please verify that you are a human!  ");
        }
    };











    render() {
        const {
            fullname,
            entreprise,
            email,
            qte,
            tel,
            message
        } = this.state.formData;

        return (
            <Fragment>
                <h4>Demander votre devis concernant cet article </h4>

                <form
                    className="row contact_form"
                    id="contactForm"
                    noValidate="novalidate"
                    onSubmit={e => this.handleSubmit(e)}
                >
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                className="form-control "
                                id="name"
                                name="fullname"
                                placeholder="Nom complet"
                                value={fullname}
                                onChange={e => this.handleFieldChange(e)}
                            />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                className="form-control"
                                id="entreprise"
                                name="entreprise"
                                placeholder="Entreprise"
                                value={entreprise}
                                onChange={e => this.handleFieldChange(e)}
                            />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="email"
                                className="form-control "
                                id="email"
                                name="email"
                                placeholder="Email Address"
                                value={email}
                                onChange={e => this.handleFieldChange(e)}
                            />
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
                                onChange={e => this.handleFieldChange(e)}
                            />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                className="form-control"
                                id="number"
                                name="tel"
                                placeholder="Telephone"
                                value={tel}
                                onChange={e => this.handleFieldChange(e)}
                            />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="form-group">
                            <textarea
                                className="form-control"
                                name="message"
                                id="message"
                                rows="1"
                                placeholder="Message"
                                value={message}
                                onChange={e => this.handleFieldChange(e)}
                            />
                        </div>
                    </div>
                    <div className="col-md-12">
                        <ReCaptchaComponent
                           // onloadCallback={e => this.handleOnloadCallback()}
                            handleVerifyCallback={ this.handleVerifyCallback}
                        />
                    </div>

                    <div className="col-md-12 text-right">
                        <button
                            type="submit"
                            className="btn btn-block primary-btn" >
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

    console.log(props)
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