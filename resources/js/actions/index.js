import {API_END_POINT} from "../components/utils/uri";

export const INIT_DATALIST = "INIT_DATALIST"
export const BRAND_SELECTED = "BRAND_SELECTED";
export const CATEGORY_SELECTED = "CATEGORY_SELECTED";
export const FAILURES_DATA = "FAILURES_DATA";

export const BRAND_LIST = "BRAND_LIST";
export const CATEGORY_LIST = "CATEGORY_LIST";
export const ASKED_DEVIS = "ASKED_DEVIS";


import axios from 'axios'
import { _setAlert } from "./alert";





//defini dans ce fichier et appeller dans App ;plutot que de le construire dans les components



export function _DATA_ARTICLES_INITIAL(articles) {
    return {
        type: INIT_DATALIST,
        value: articles
    };
}





export function _FAILURES_DATA_ARTICLES(error) {

    return {
        type: FAILURES_DATA,
        value: error
    };
}

export function _BRANDS(brands) {

    return {
        type: BRAND_LIST,
        value: brands
    };
}

export function _CATEGORIES(categories) {

    return {
        type: CATEGORY_LIST,
        value: categories
    };
}




/**
 * Get all lists
 */
export const _GETALLDATALIST = () => async dispatch => {

    
    try {
        const res = await axios.get(`${API_END_POINT}products`);
        console.log('AllList', res.data)

        dispatch({
            type:BRAND_LIST,
            value:res.data.brands
        });
        dispatch({
            type: CATEGORY_LIST,
            value: res.data.categories
        });
        dispatch({
            type:INIT_DATALIST,
            value: res.data.products
        })
       

    } catch (error) {
        console.log('get_all_list', error)
    }

}



/**
 * Select a brand
 */
export const _SELECTED_BRAND = brand => async dispatch=> {

        try {
            const res = await axios.get(`${API_END_POINT}fabricant/${brand}` )
            //console.log(res.data.brand);

             dispatch({ 
                type: BRAND_SELECTED,
                value: res.data.brand
             })

        } catch (error) {
            console.log('brand_selected', error)

        }

        
}


/**
 * Seclect category
 */
export const _SELECTED_CATEGORY = category=> async dispatch=> {

    try {
        const res = await axios.get(`${API_END_POINT}categorie/${category}`)
        //console.log(res.data.category);

        dispatch({ 
            type: CATEGORY_SELECTED,
            value: res.data.category
         })

    } catch (error) {
        console.log('category_selected', error)

    }

    
}




/**
 * Simple request without action redux
 * to create brand (and image)
 */

export const _CREATE_BRAND = data => async dispatch=> {

    console.log('DATA-entrant',data)

    //const config = { headers: { 'Content-Type': 'multipart/form-data' } }

    try {

        const res = await axios.post(`${API_END_POINT}fabricants`, data)
        console.log('data-sortant',res );

        // call action redux to show message notif
        dispatch(_setAlert('Nouveau fournisseur ajoutée', 'success') )

         /*   
          dispatch({
            type: CATEGORY_SELECTED,
            value: res.data.category
          }) 
        */

        return 'success'
        document.getElementById('form-brand').reset(0); // clear input file

    } catch(error) {
        console.log('error_save_brand', error.response.data.errors)
        let errors = error.response.data.errors;

        
            Object.keys(errors).map((error, index) => (
                console.log(errors[error][0] )
                    // call action redux to show errors validation
                     (dispatch(_setAlert('Error:'+ errors[error][0], 'error')))
            ))
        
        return errors;

    }


}







/**
 * Simple request without action redux
 */

export const _ASKED_DEVIS = async(data) => {

    try {

       const response =  await axios.post(`${API_END_POINT}devis`, data);

       console.log('Rdata',response.status  )

       return response;

    } catch(error) {
        //error.response.data.errors;
        console.log('error_asked_edvis', error.response.data)
        let errors = error.response;

        return errors;
       
    }


}


/**
 * Simple request to contacPost action controller
 */
export const _SENDMAIL = data => async dispatch => {

    try {
        const response = await axios.post(`${API_END_POINT}contact`, data);

        console.log('Rdata', response.status)

        if (response.status === 200) {
            dispatch(_setAlert('Message envoyé. Merci pour votre confiance', 'success'))
        }

        return response;

    } catch (error) {
        console.log('error_send_mai_contact_form', error.response)
        let errors = error.response.data.errors;

        if(error.response.status === 422){
            
             errors=  {
                 ...errors,
                 status :422
             }

            return error.response;
        }else{

            Object.keys(errors).map((error, index) => (
                console.log(errors[error])
                    (dispatch(_setAlert('Error:' + errors[error], 'error')))
            ))
        }

        

    }
}


/**
 * Le paramètre type d'une action est obligatoire alors que 
 * le paramètre value est optionnel. 
 * Selon l'action, la value n'est parfois pas nécessaire.
 */