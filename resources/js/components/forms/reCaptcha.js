import React, { Component, Fragment } from 'react'
import Recaptcha from "react-recaptcha";
import { RCAPTCHA_KEY_CLIENT } from '../utils/keys';

export default class ReCaptchaComponent extends Component {

    constructor(props){
        super(props)
        this.state = {
            isVerifiedLocal: false
        }
    }

    onloadCallback = () => {
        console.log('recaptch load successfully')
    }


    verifyCallback =  () => {
        console.log('recaptch verify successfully')
        //this.props.verifyCallback();
        let value;
         this.setState({ isVerifiedLocal : !this.state.isVerifiedLocal}, ()=>{

            value= this.state.isVerifiedLocal;
         }) ;
        console.log('rsate',value)

        this.props.handleVerifyCallback(value) ;

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
