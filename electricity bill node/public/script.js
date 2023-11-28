const calculateBill=(e)=>{
    e.preventDefault();
    const units = document.getElementById('units').value;
    console.log('in the calculte bill function. data is: ',units)

    if(units == ''){
        alert("Please enter no of units used")
    }
    else{
        $.ajax({
            type: 'POST',
            url: '/calculate',
            data: {units: units},
            success: (data)=>{
                const resultDiv = $('#result')
                resultDiv.html(`Your electricity bill is: ${data.bill}`)
                
            },
            error: (error)=>{
                alert('mistake in calculating the bill', error)
            }
        })
    }

    return false;

}