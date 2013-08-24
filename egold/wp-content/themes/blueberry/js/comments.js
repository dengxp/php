jQuery(function($) {
    $('#author').focus(function() {
        if ( this.value == 'your name' ) {
            this.value = '';
        }
    })
    $('#author').blur(function() {
        if ( this.value == '' ) {
            this.value = 'your name'
        }
    });
    $('#email').focus(function() {
        if ( this.value == 'your email' ) {
            this.value = '';
        }
    })
    $('#email').blur(function() {
        if ( this.value == '' ) {
            this.value = 'your email'
        }
    });
    $('#comment').focus(function() {
        if ( this.value == 'your comment...' ) {
            this.value = '';
        }
    })
    $('#comment').blur(function() {
        if ( this.value == '' ) {
            this.value = 'your comment...'
        }
    });
});