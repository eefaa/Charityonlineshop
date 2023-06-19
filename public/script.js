const stripe = Stripe("pk_test_51NDTYII77OwsPp92NIJ6jCPufU8IyTVWSOFr5DzIXqgZm6QgQ4jBIMhQdYcDZjAhm8F6UhALA61tpYaCjV7T1CfE00p4X7fw4o")
const btn = document.querySelector('#btn')
btn.addEventListener('click', ()=>{
    fetch('/CheckoutPage.php',{
        method:"POST",
        headers:{
            'Content-Type' : 'application/json',
        },
        body: JSON.stringify({})
    }).then(res=> res.json())
    .then(payload => {
        stripe.redirectToCheckout({sessionId:payload.id})
    })
})