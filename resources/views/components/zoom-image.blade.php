<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(255, 254, 254, 0.9)
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    .modal-content {
        animation-name: zoom;
        animation-duration: 0.6s;
        border-radius: 5px;
    }

    @keyframes zoom {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }

    .close {
        position: absolute;
        top: 10%;
        right: 22%;
        color: black;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
    }
</style>

<div class="zoomImg" data-imgsrc="{{ $imgSrc }}" data-caption="{{ $caption }}">
    <img src="{{ $imgSrc }}" alt="{{ $caption }}" style="width: 50px; height: 50px; border-radius: 50%; cursor: pointer;">
</div>

<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption" class="caption"></div>
</div>

<script>
    $(document).ready(function() {
        $(".zoomImg").on("click", function() {
            var imgSrc = $(this).data("imgsrc");
            var caption = $(this).data("caption");

            $("#myModal").css("display", "block");
            $("#img01").attr("src", imgSrc);
            $("#caption").text(caption);
        });

        $(".close").on("click", function() {
            $("#myModal").css("display", "none");
        });

        $(window).on("click", function(event) {
            if (event.target == $("#myModal")[0]) {
                $("#myModal").css("display", "none");
            }
        });
    });
</script>
