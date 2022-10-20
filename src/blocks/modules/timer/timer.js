import { getDate } from "./getDate";
import { getTimeRemaining } from "./getTimeRemaining";
import { timeDOMIterator } from "./timeDOMSetIterator";

$(function() {
    const $timer = $('.js-timer');
    const days = $timer.attr('data-day');
    const $numbers = $timer.find(".js-timer-num");

    const date = getDate(days)
    console.log(date);

    function updateClock() {
        let time = getTimeRemaining(date);
        timeDOMIterator($numbers, time)
        if (time.total <= 0) clearInterval(timeinterval);
    }
    
    updateClock();
    let timeinterval = setInterval(updateClock, 1000);
})
