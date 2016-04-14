


    var $window = jQuery(window)

    // Disable certain links in docs
    jQuery('section [href^=#]').click(function (e) {
      e.preventDefault()
    })

    // side bar
    jQuery('.bs-docs-sidenav').affix({
      offset: {
        top: function () { return $window.width() <= 980 ? 290 : 210 }
      , bottom: 270
      }
    })

    // make code pretty
    window.prettyPrint && prettyPrint()

    // add-ons
    jQuery('.add-on :checkbox').on('click', function () {
      var $this = jQuery(this)
        , method = $this.attr('checked') ? 'addClass' : 'removeClass'
      jQuery(this).parents('.add-on')[method]('active')
    })

    // add tipsies to grid for scaffolding
    if (jQuery('#gridSystem').length) {
      jQuery('#gridSystem').tooltip({
          selector: '.show-grid > div'
        , title: function () { return jQuery(this).width() + 'px' }
      })
    }

    // tooltip demo
    jQuery('.tooltip-demo').tooltip({
      selector: "a[rel=tooltip]"
    })

    jQuery('.tooltip-test').tooltip()
    jQuery('.popover-test').popover()

    // popover demo
    jQuery("a[rel=popover]")
      .popover()
      .click(function(e) {
        e.preventDefault()
      })

    // button state demo
    jQuery('#fat-btn')
      .click(function () {
        var btn = jQuery(this)
        btn.button('loading')
        setTimeout(function () {
          btn.button('reset')
        }, 3000)
      })

    // carousel demo
    jQuery('#myCarousel').carousel()

    // javascript build logic
    var inputsComponent = jQuery("#components.download input")
      , inputsPlugin = jQuery("#plugins.download input")
      , inputsVariables = jQuery("#variables.download input")

    // toggle all plugin checkboxes
    jQuery('#components.download .toggle-all').on('click', function (e) {
      e.preventDefault()
      inputsComponent.attr('checked', !inputsComponent.is(':checked'))
    })

    jQuery('#plugins.download .toggle-all').on('click', function (e) {
      e.preventDefault()
      inputsPlugin.attr('checked', !inputsPlugin.is(':checked'))
    })

    jQuery('#variables.download .toggle-all').on('click', function (e) {
      e.preventDefault()
      inputsVariables.val('')
    })

    // request built javascript
    jQuery('.download-btn').on('click', function () {

      var css = jQuery("#components.download input:checked")
            .map(function () { return this.value })
            .toArray()
        , js = jQuery("#plugins.download input:checked")
            .map(function () { return this.value })
            .toArray()
        , vars = {}
        , img = ['glyphicons-halflings.png', 'glyphicons-halflings-white.png']

    jQuery("#variables.download input")
      .each(function () {
        jQuery(this).val() && (vars[ jQuery(this).prev().text() ] = jQuery(this).val())
      })

      jQuery.ajax({
        type: 'POST'
      , url: /\?dev/.test(window.location) ? 'http://localhost:3000' : 'http://bootstrap.herokuapp.com'
      , dataType: 'jsonpi'
      , params: {
          js: js
        , css: css
        , vars: vars
        , img: img
      }
      })
    })

// Modified from the original jsonpi https://github.com/benvinegar/jquery-jsonpi
jQuery.ajaxTransport('jsonpi', function(opts, originalOptions, jqXHR) {
  var url = opts.url;

  return {
    send: function(_, completeCallback) {
      var name = 'jQuery_iframe_' + jQuery.now()
        , iframe, form

      iframe = jQuery('<iframe>')
        .attr('name', name)
        .appendTo('head')

      form = jQuery('<form>')
        .attr('method', opts.type) // GET or POST
        .attr('action', url)
        .attr('target', name)

      jQuery.each(opts.params, function(k, v) {

        $('<input>')
          .attr('type', 'hidden')
          .attr('name', k)
          .attr('value', typeof v == 'string' ? v : JSON.stringify(v))
          .appendTo(form)
      })

      form.appendTo('body').submit()
    }
  }
})