var array = [];
        const blurReload = ( index, price) =>{
            const valueQuantity = document.getElementsByClassName(`qty-input-${index}`)[0].value;
            if(index == 4){
                var value = parseInt(valueQuantity);

                value = isNaN(value) ? 0 : value;
                if (value <= 1) {
                    document.getElementsByClassName(`qty-input-${index}`)[0].value = value;
                    result = price * value;
                    document.getElementsByClassName(`total-${index}`)[0].innerHTML = result;
                    renderTotal(index,result,value);
                } else {
                    swal ( " Không được đặt quá 1 vé! ","Vé dành cho đoàn khách không quá 25 người!","error" ) ;
                    document.getElementsByClassName(`qty-input-${index}`)[0].value = 0;
                    document.getElementsByClassName(`total-${index}`)[0].innerHTML = 0;
                    renderTotal(index,0,value);
                }
            }else{
                var value = parseInt(valueQuantity);

                value = isNaN(value) ? 0 : value;
                if (value <= 10) {
                    document.getElementsByClassName(`qty-input-${index}`)[0].value = value;
                    result = price * value;
                    document.getElementsByClassName(`total-${index}`)[0].innerHTML = result;
                    renderTotal(index,result,value)
                } else {
                    swal ("Không thể đặt quá hơn 10 vé!"," ","error");
                    document.getElementsByClassName(`qty-input-${index}`)[0].value = 0;
                    document.getElementsByClassName(`total-${index}`)[0].innerHTML = 0;
                    renderTotal(index,0,value);
                }
            }
        }
        function incrementQuantity(index, price) {
            var result = 0
            const valueQuantity = document.getElementsByClassName(`qty-input-${index}`)[0].value;
            if(index == 4){
                var value = parseInt(valueQuantity);

                value = isNaN(value) ? 0 : value;
                if (value < 1) {
                    value++;
                    document.getElementsByClassName(`qty-input-${index}`)[0].value = value;
                    result = price * value;
                    document.getElementsByClassName(`total-${index}`)[0].innerHTML = result;
                    renderTotal(index,result,value)
                } else {
                    swal ( " Không được đặt quá 1 vé! ","Vé dành cho đoàn khách không quá 25 người!","error" ) ;
                }
            }else{
                var value = parseInt(valueQuantity);

                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    document.getElementsByClassName(`qty-input-${index}`)[0].value = value;
                    result = price * value;
                    document.getElementsByClassName(`total-${index}`)[0].innerHTML = result;
                    renderTotal(index,result,value)
                } else {
                    swal ("Không thể đặt quá hơn 10 vé!"," ","error");
                }
            }

        };

        function decrementQuantity(index, price) {
            var result = 0;
            const valueQuantity = document.getElementsByClassName(`qty-input-${index}`)[0].value;

            var value = parseInt(valueQuantity);

            value = isNaN(value) ? 0 : value;
            if (value > 0) {
                value--;
                document.getElementsByClassName(`qty-input-${index}`)[0].value = value;
                result = price * value;
                document.getElementsByClassName(`total-${index}`)[0].innerHTML = result;
                renderTotal(index,result,value)
            }
        };
        function refreshQuantity(index, price) {
            var result = 0;
            const valueQuantity = document.getElementsByClassName(`qty-input-${index}`)[0].value;

            var value = parseInt(valueQuantity);

            value = isNaN(value) ? 0 : value;
            if (value > 0) {
                document.getElementsByClassName(`qty-input-${index}`)[0].value = 0;
                document.getElementsByClassName(`total-${index}`)[0].innerHTML = 0;
                renderTotal(index,0,value)
            }
        };
        const renderTotal =  (index,result,value) => {
            const id = array.findIndex(item => item.position === index)
                if(id !== -1) {
                    array[id] = {total:result,position:index, quantity:value}
                }else{
                    array.push({total:result,position:index, quantity:value})
                }
            const cartTotal = array.length > 0 ? array.map(item=>item.total).reduce((p,c) =>  p + c ) : 0 ;

            document.getElementsByClassName(`cart-total`)[0].innerHTML = cartTotal;
        }


