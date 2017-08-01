function toggleSideBar() {
    console.log( 'aaaaaaaaac' );
    $('#aside').toggleClass( 'hide' );
    $('#wrapper').toggleClass( 'hide' );
    return false;
}

function atualizarTabelaPermissoes( select ) {
    
    // seta o identificador
    var id = select.val();

    // esconde
    $( '.hidden-row' ).addClass( 'hidden' );

    // exibibe
    $( '.'+id ).removeClass( 'hidden' );
}

$( document ).ready( function() {
    $('.fade-in').animate( { opacity: 1 }, 1000 );
});
