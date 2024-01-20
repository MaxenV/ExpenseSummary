import './bootstrap';

import $ from 'jquery';
import Popper from 'popper.js';
import Swal from 'sweetalert2';

try{
    window.Popper = Popper;    
    window.$ = window.jQuery = $;
    window.$wal = Swal;
}catch(e){
    console.log(e);
}