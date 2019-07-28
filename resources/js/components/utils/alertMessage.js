import { connect } from 'react-redux';

import { ShowNotification } from './notification';

 

const AlertMessage = ({ alerts,}) => {
  return  alerts !== null &&
          alerts.length > 0 &&
          alerts.map(alert => (

            ShowNotification(
                alert.alertType, 
                alert.msg)
        ));
}
const mapStateToProps = state => ({
    alerts: state.alertMessage
});

export default connect(mapStateToProps, null)(AlertMessage);

