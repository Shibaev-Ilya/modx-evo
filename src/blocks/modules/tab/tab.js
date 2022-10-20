$(()=> {
    const $tabItem = $(".js-tab-item")

    $tabItem.on("click", (e)=> {
        const target = $(e.target)
        $tabItem.removeClass("active")
        target.addClass("active")
    })
})