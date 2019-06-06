
export const INIT_DATALIST = "INIT_DATALIST"
export const BRAND_SELECTED = "BRAND_SELECTED";
export const CATEGORY_SELECTED = "CATEGORY_SELECTED";
export const FAILURES_DATA = "FAILURES_DATA";

export const BRAND_LIST = "BRAND_LIST";
export const CATEGORY_LIST = "CATEGORY_LIST";

//forms
export const ASKED_DEVIS = "ASKED_DEVIS";

import axios from 'axios'



//defini dans ce fichier et appeller dans App ;plutot que de le construire dans les components



export function _DATA_ARTICLES_INITIAL(articles) {
    return {
        type: INIT_DATALIST,
        value: articles
    };
}


export function _SELECTED_BRAND(brand){

    return{
        type: BRAND_SELECTED,
        value: brand
    }
}

export function _SELECTED_CATEGORY(category) {

    return {
        type: CATEGORY_SELECTED,
        value: category
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









export const _ASKED_DEVIS = async (data) => {

    try {

        console.log('to_action_asked', data)
        
       await axios.post('/')
        
    } catch (error) {
        console.log('error_asked_edvis', error)
    }


}

/**
 * Le paramètre type d'une action est obligatoire alors que 
 * le paramètre value est optionnel. 
 * Selon l'action, la value n'est parfois pas nécessaire.
 */