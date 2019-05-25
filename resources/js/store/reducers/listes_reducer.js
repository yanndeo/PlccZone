
import { BRAND_LIST , CATEGORY_LIST} from '../../actions/index';



let initialState = {
    brand_list: [],
    caegory_list: [],
};


function listeBrandANDCategory(state = initialState, action) {
    let nextState

    console.log('State_Globale2::', state);

    switch (action.type) {

        case BRAND_LIST:

            return nextState = {
                ...state,
                brand_list: action.value
            };

        case CATEGORY_LIST:

            return nextState = {
                ...state, 
                caegory_list: action.value
            };


        default:
            return state;


    }

    // Modification du state en fonction de l'action ici



}

export default listeBrandANDCategory;



