import React, { Component, Fragment } from 'react'
import Recaptcha from "react-recaptcha";
import { RCAPTCHA_KEY_CLIENT } from '../utils/keys';

export default class ReCaptchaComponent extends Component {

    constructor(props){
        super(props)
        this.state = {

            isVerifiedLocal: false,
            isLoadedLocal: false
        }
    }


    /**
     * Au chargement du reacptcha
     */
    onloadCallback = () => {

        let loadValue ;

        this.setState({ isLoadedLocal : !this.state.isLoadedLocal}, ()=>{
            
            loadValue = this.state.isLoadedLocal 

            console.log('rloader', loadValue);

            this.props.handleOnloadCallback(loadValue);

            console.log('recaptch load successfully')
        });

        
    }



    /**
     * Verifie le check du recaptcha
     */
    verifyCallback =  () => {

        let value;

        this.setState({ isVerifiedLocal : !this.state.isVerifiedLocal}, ()=>{

            value= this.state.isVerifiedLocal;

            console.log('rstate', value)

            this.props.handleVerifyCallback(value);
            
            console.log("recaptch verify successfully");
         }) 

      

    }




    render() {
        return (
            <Fragment>
                <Recaptcha
                    sitekey={RCAPTCHA_KEY_CLIENT}
                    render="explicit"
                    verifyCallback={e=>this.verifyCallback()}
                    onloadCallback={e=>this.onloadCallback()}
                />
            </Fragment>
        );
    }
}
