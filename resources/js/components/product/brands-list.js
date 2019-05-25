import React, {Component} from 'react';
import BrandItem from './brand-item';
import { connect } from 'react-redux';

//actions
import { _SELECTED_BRAND, _DATA_ARTICLES_INITIAL} from "../../actions/index";



const INIT_ECART = {
    X: Number(0),
    Y: Number(7)
} 

class BrandList extends Component {
    constructor(props){
        super(props)
        this.state = INIT_ECART
    }


    //function load/scroll brands when we click
    handleLoadBrand(){
        let brands = this.props.brands.slice(this.state.X, this.state.Y)
         if(brands.length > 0){
             this.setState({
                 X: this.state.X + 7,
                 Y: this.state.Y + 7
             })

         }else{ this.setState(INIT_ECART);}
    }

  
    // function make a brand list map
    renderBrandList(){

        const brandsTotal = this.props.brands
        let brands = brandsTotal.slice(this.state.X, this.state.Y)

        return( brands.map((brand, i) => {
            return (
                    <BrandItem
                        key={brand.id}
                        brand ={brand}
                        selectedBrandCallback={() => this.props.dispatch( _SELECTED_BRAND(brand)) }   //action

                    />
                 )
           })
         )
    }


    render() {

        const brandsTotal = this.props.brands
        let brands = brandsTotal.slice(this.state.X, this.state.Y)   // à ne pas suppr.

        console.log('BRANDS___:', brands)

        return (
            <div className="sidebar-categories">
                <div className="head">Fabricants</div>

                <ul className="main-categories">
                    {this.renderBrandList()}
                </ul>
              
            { //condition
                brands.length !==0 
            
            ? 
                        <div 
                            onClick={()=>this.handleLoadBrand()}
                            className="head " 
                            style={{ paddingRigth:'32', backgroundColor:'orange'}}>
                            <span> LOAD MORE <i className="fa fa-spinner fa-spin"></i></span>
                        </div>
            :         
                        <div 
                            onClick={() => this.handleLoadBrand()}
                            className="head "
                            style={{ paddingRigth: '32', backgroundColor: '#D3D3D3' }}>
                            <span> RETOUR <i className=" fa fa-arrow-left"></i></span>
                        </div>
            }     
                

            </div>
        );
    }
}


//connexion du state globlale(une patie ) aux props du component
/* const mapStateToProps = (state) => {
    return {
        initial_articles: state.initial_articles
    };
}  */
export default connect()(BrandList);
