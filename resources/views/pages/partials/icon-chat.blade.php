<a id="messLink" class="icon-chat-social-fb hidden" href="https://www.facebook.com/messages/t/261675327026762" target="_blank">
   <img src="/images/svg/des_mess.svg" alt="">
</a>
<a class="icon-chat-social-zl hidden" href="https://zalo.me/0865654165" target="_blank">
    <img src="/images/svg/des_zalo.svg" alt="">
</a>
<a class="icon-chat-social-call hidden" href="tel:+84865654165" >
   <img src="/images/svg/des_phone.svg" alt="">
</a>
<a class="icon-chat-social-call-phone hidden" href="tel:+84865654165" >
    <span><img src="/images/svg/phone-icon.svg" alt="" style="height: 16px; width: 16px"></i> 0865654165</span>
</a>
<a class="icon-close-chat hidden" style="" href="#">
    <img src="/images/svg/close-icon.svg" alt="" style="height: 20px; width: 20px">
</a>
<a class="icon-chat-social" href="#" style="transition: all 0.3s ease-in">
   <img src="/images/svg/des_mix.svg" alt="">
</a>
@push('scripts')
<script type="text/javascript">
    $(document).ready(async function() {
        const link = document.getElementById('messLink');
        if (window.innerWidth < 600) {
            link.href = 'https://m.me/myfarm.trongcaynuoicon';
        } else {
            link.href = 'https://www.facebook.com/messages/t/261675327026762';
        }
    });
    $('.icon-chat-social').click(function(e) {
        e.preventDefault();
        $('.icon-close-chat').removeClass('hidden');
        $('.icon-chat-social-zl').removeClass('hidden');
        $('.icon-chat-social-call').removeClass('hidden');
        $('.icon-chat-social-fb').removeClass('hidden');
        $('.icon-chat-social').addClass('hidden');
    });
    $('.icon-close-chat').click(function(e) {
        e.preventDefault();
        $('.icon-close-chat').addClass('hidden');
        $('.icon-chat-social-zl').addClass('hidden');
        $('.icon-chat-social-call').addClass('hidden');
        $('.icon-chat-social-fb').addClass('hidden');
        $('.icon-chat-social').removeClass('hidden');
    });
    $(".icon-chat-social-call,icon-chat-social-call-phone").on({
        mouseenter: function () {
            $(".icon-chat-social-call-phone").removeClass('hidden');
        },
        mouseleave: function () {
            $(".icon-chat-social-call-phone").addClass('hidden');
        }
    });
</script>
@endpush

