jq(document).ready(function() {
    var byRow = jq('.account-create');

    jq('.main-container').each(function() {
        jq(this).find('.matchHeight').matchHeight(byRow);
    });                    
});
