<?php /* Template Name: About Us */ ?>


<?php
    $thumbnail = get_the_post_thumbnail_url();
?>

<?php get_header(); ?>

<div class="content">
    <div class="container clearfix">
        <h1>АВАЛОН НЕДВИЖИМИ ИМОТИ</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $thumbnail ?>" alt="Avalon Ltd">
            </div>
            <div class="col-md-6">
                <div class="about-info p20">
                    <p>
                        Агенция за недвижими имоти 'Авалон', отваря врати през 2008 година и се реализира успешно на пазара повече от десет години. 
                    </p>
                    <p>
                        Ние се ангажираме да Ви дадем професионални съвети, които ще Ви помогнат да сключите най-изгодната за вас сделка. 
                        Сред услугите които предлагаме са: съдействие при получаване на банков кредит, юридически съвети и представяне на актуална пазарна информация за района, който Ви интересува.
                    </p>
                    <p>
                        Благодарение на информационна система <a href="www.avalon-ruse.com">www.avalon-ruse.com</a> и <a href="http://avalonruse.imot.bg">http://avalonruse.imot.bg</a>, можем да Ви предложим достъп до актуални оферти от всички пазарни сегменти.
                    </p>
                    <p>
                        Кантора АВАЛОН предлага на ексклузивните си клиентите 10% отстъпка от комисиона при сделка.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
