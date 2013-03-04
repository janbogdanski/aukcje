<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>

<h2><?php echo __('Galleries'); ?></h2>
<?php if($this->UserAuth->isLogged()): ?>

<?php echo $this->Html->link( '<i class="m-icon-swapright  m-icon-white"></i> '.__('New Gallery'), array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>


<table class="table table-striped">
    <thead>
    <tr>

    <th><?php echo __('ID'); ?></th>
        <th><?php echo __('Thumbnail'); ?></th>
        <th><?php echo __('Title'); ?></th>
        <th><?php echo __('Options'); ?></th>
    </tr>
    </thead>

    <?php

    foreach( $galleries as $gallery ): ?>

        <tr>
        <td><?php echo $gallery['Gallery']['id']; ?></td>
        <td><?php echo $this->Html->image($this->PicasaImageSize->picasaImgScaledUrl($gallery['Gallery']['mini'] ,PicasaImageSizeHelper::PHOTO_THUMB_LIST), array("alt" => "Brownies")); ?></td>
        <td><?php echo $gallery['Gallery']['title']; ?></td>

        <td class="options">
            <div class="m-btn-strip">
                <div class="m-btn-group">
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gallery['Gallery']['id']), array('class' => 'm-btn mini blue') );?>
        <?php echo $this->Html->link(__('Preview'), array('action' => 'view', $gallery['Gallery']['id']), array('class' => 'm-btn mini green', 'target' => '_blank') );?>
        <?php echo $this->Html->link(__('Code'), array('action' => 'code', $gallery['Gallery']['id']), array('data-toggle' => 'modal','class' => 'm-btn mini purple') );?>



                    <?php echo $this->Form->postLink(__('Delete'), array(
            'action' => 'delete',
            $gallery['Gallery']['id']), array(
                    'confirm'=>__('Are you sure you want to delete that gallery??'),
                    'class' => 'm-btn mini red') );?>
            </div>
            </div>
        </td>
        </tr>
        <?php endforeach;?>

</table>
<?php if(count($galleries) > 4): ?>

<?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> '.__('New Gallery'), array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
<?php endif; ?>
<?php else: ?>
    <div class="row">
        <div class="span5">
            <p>Jak głosi prastare chińskie przysłowie
            <blockquote>
                <p>Jeśli kto przez całe życie poluje na dzikie gęsi, w końcu mu dzika gęś oko wydłubie.</p>
            </blockquote>
            a właściwie
            <blockquote>
                <p>Jeden obraz wart więcej niż tysiąc słów.</p>
            </blockquote>
            </p>
            <p>Większość ludzi to wzrokowcy, co można sprowadzić do stwierdzenia, że większość z nas kupuje "oczami". Ważne jest więc nie tylko to, co sprzedajesz, ale jak to zaprezentujesz - rozbudzając wyobraźnię klienta zwiększasz swoją szansę na srzedaż, ot co.</p>
            <p><strong>Galeria zdjęć</strong> jest po to, aby zaprezentować kupującym produkt, którego z racji charakteru aukcji internetowych nie mogą wziąć do ręki i ocenić empirycznie.</p>
            <p>Galeria charakteryzuje się kilkoma cechami, które w połączeniu z edytorem zdjęć stanowią bardzi potężne narzędzie:
            <ul>
                <li>Oszczędzasz pieniądze (nie płacisz za dodatkowe zdjęcia w Allegro)</li>
                <li>Nieograniczona liczba zdjęć w galerii</li>
                <li>Nieograniczona liczba galerii</li>
                <li>Proste zarządzanie zdjęciami w galerii</li>
                <li>Bardzo proste zarządzanie samymy galeriami</li>
                <li>Integracja z kreatorem aukcji - dodasz galerie bezpośrednio przy tworzeniu aukcji</li>
            <li>Pobierzesz kod galerii do wstawienia jako niezależny moduł (strona www, forum etc...)</li>
            <li>Wysoka jakość zdjęć w galerii</li>
            <li>Różnorakie motywy / schematy galerii</li>
            </ul></p>
            <p><strong>Edytor zdjęć</strong> pozwoli przygotować zdjęcia do wstawienia do galerii - przyciąć, zmniejszyć, wyostrzyć, rozmyć, dodać tekst, watermark, rozjaśnić, przyciemnić....</p>
        </div>
        <div class="span4">
            <h4><?php echo __('Log in to manage your %s', __('galleries')); ?></h4>
            <?php echo $this->element('login', array(), array('plugin' => 'Usermgmt')); ?>
        </div>
    </div>
<?php endif; ?>