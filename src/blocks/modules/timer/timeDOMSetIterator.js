export const timeDOMIterator = ($numbers, time) => {
    Object.keys(time).forEach((item, i)=> {
        if(i <= $numbers.length - 1) $numbers.eq(i).html(("0" + time[item]).slice(-2));
    })
}