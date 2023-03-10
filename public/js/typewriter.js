new TypeIt("#homeHeading", {
    speed: 50,
    startDelay: 1500,
    loop: true
  })
    .type("Need a ", { delay: 100 })
    .type('<em><strong class="font-semibold">CAR?</strong></em>',{ delay: 2000, } ,{
      speed: 50,
    })
    .delete(12)

    .type("Need to rent a ", { delay: 100 })
    .type('<em><strong class="font-semibold">CAR?</strong></em>',{ delay: 2000, } ,{
      speed: 50,
    })
    .delete(20)

    .type("Get vehicle ", { delay: 100 })
    .type('<em><strong class="font-semibold">HERE.</strong></em>',{ delay: 2000, } ,{
      speed: 50,
    })
    .delete(18)
    

    .type("Make your trip ", { delay: 100 })
    .type('<em><strong class="font-semibold">ENJOYABLE.</strong></em>',{ delay: 2000, } ,{
      speed: 50,
    })
    .delete(26)


    .go();
    