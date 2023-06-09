<script>
    function changeBorderColor(element) {
        element.classList.add('hovered');
    }
    function resetBorderColor(element) {
        element.classList.remove('hovered');
    }
    document.addEventListener("DOMContentLoaded", function() {
        let cards = document.querySelectorAll(".cardBg");
        
        cards.forEach(function(card) {
            let imgUrl = card.dataset.image;
            card.style.backgroundImage = "url('" + imgUrl + "')";
        });
    });
</script>