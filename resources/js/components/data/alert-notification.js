
import React from 'react'

const AlertNotification = ({type, messag}) => {
    return (
        <div className={`alert alert-${type}`} role="alert">
           {messag}
        </div>
    )
}

export default AlertNotification