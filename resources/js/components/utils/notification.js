import Noty from "noty";
import "../../../../node_modules/noty/lib/noty.css";
import "../../../../node_modules/noty/lib/themes/sunset.css";

export const ShowNotification = (type, text)=>{
    new Noty({
        type: type,
        text: text,
        layout: "bottomRight",
        theme: "sunset",
        timeout: 6000
    }).show();
}


