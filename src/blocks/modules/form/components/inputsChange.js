export const inputsChange = (inputs) => {
    inputs.on('input', (e)=> {                
        const target = e.target
        if(target.name === "name" && target.value.length > 3) target.classList.remove('error')
        if(target.name === "phone" && target.value.length >= 11) target.classList.remove('error')
    })
}