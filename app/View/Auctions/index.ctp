<?php
/**
 * @author          Jan Bogdanski <janek.bogdanski@gmail.com>
 *
 * Creation date    17.10.12 20:14
 * @var $this View
 */
?>
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">

</script>
<h2><?php echo __('Auctions'); ?></h2>

    <?php if($this->UserAuth->isLogged()): ?>

    <?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> '.__('New Auction'), array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
<?php if(isset($auctions) && count($auctions)): ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th><?php echo __('ID'); ?></th>
        <th><?php echo __('Title'); ?></th>
        <th><?php echo __('Options'); ?></th>
    </tr>
    </thead>
    <tbody>

    <?php foreach( $auctions as $auction ): ?>

    <tr>
        <td><?php echo $auction['Auction']['id'];?></td>
        <td><?php echo $auction['Auction']['title_list'];?></td>


        <td class="options">
            <div class="m-btn-strip">
                <div class="m-btn-group">
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $auction['Auction']['id']), array('class' => 'm-btn mini blue') );?>
            <?php echo $this->Html->link(__('Preview'), array('action' => 'preview', $auction['Auction']['id']), array('class' => 'm-btn mini green', 'target' => '_blank') );?>
            <?php echo $this->Html->link(__('Code'), array('action' => 'preview', $auction['Auction']['id']), array('data-toggle' => 'modal','class' => 'm-btn mini purple') );?>

            <?php echo $this->Form->postLink(__('Delete'), array(
            'action' => 'delete',
            $auction['Auction']['id']), array(
            'confirm'=> __('Are you sure you want to delete that auction?'),
            'class' => 'm-btn mini red') );?>
                </div>
                </div>
        </td>
    </tr>

        <?php endforeach; ?>
    </tbody>
</table>

    <?php if(count($auctions) > 4): ?>
<?php echo $this->Html->link( '<i class="m-icon-swapright m-icon-white"></i> '.__('New Auction'), array( 'action' => 'add' ),array('escape' => false,'class' => 'm-btn blue') ); ?>
    <?php endif; ?>

<?php else: ?>
<p>
    <?php echo __d('auction', 'No auctions to list'); ?>
</p>
<?php endif; ?>
<?php else: ?>
<div class="row">
    <div class="span5">

        <p><strong>Kreator aukcji proaukcje.eu</strong> to narzędzie online umożliwiające tworzenie atrakcyjnych pod
            względem wizualnym i treści aukcji. W wizualnym edytorze wykorzystać można takie narzędzia jak:
        <ul>
            <li>Szablony aukcji z wydzielonymi sekcjami na nagłówek, treść aukcji, dane teleadresowe, info o przesyłce czy regulamin.</li>
            <li>Galeria zdjęć - <strong>zapewniamy hosting obrazów</strong> nawet dla konta darmowego</li>
            <li>Edytor zdjęć</li>
            <li>
                <ul>
                    <li>zmiana rozmiaru zdjęć i kadrowanie</li>
                    <li>obracanie</li>
                    <li>rozjaśnianie, przyciemnianie</li>
                    <li>wyostrzanie</li>
                    <li>dodawanie tekstu (np. watermark)</li>
                    <li>swobodne rysowanie (np. do ukrycia poufnych danych)</li>
                </ul>
            </li>
        </ul>
        </p>
        <p>Do tworzenia opisu aukcji udostępniony został zacny edytor, który posiada łatwe w obsłudze a przy tym zaawansowane możliwości redagowania tekstu. Są to m.in:
        <ul>
            <li>Pogrubienia, podkreślenia...</li>
            <li>Wstawianie pojedyńczych obrazków</li>
            <li>Wstawianie galerii zdjęć</li>
            <li>Wstawianie kodów QR (np. adres strony www, kontakt do biura) - skanowanie kodu QR aparatem telefonu komórkowego może być atrakcyjne dla zabieganych klientów!</li>
            <li>Wstawianie odnośników do innych stron</li>
            <li>Wyrównywanie tekstu, kolorowanie, zmiana czcionki (typu i rozmiaru)</li>
            <li>Wstawianie tabel - gdy chcesz porównać cechy swego doskonałego produtu z marnym produktem konkutencji :)</li>
        </ul>
        </p>
        <p>Kurcze, strasznie dużo tych opcji :), można by jeszcze tak dłuugo, taki ten serwis jest..</p>
    </div>
    <div class="span4">
        <h4><?php echo __('Log in to manage your %s', __('auctions')); ?></h4>
        <?php echo $this->element('login', array(), array('plugin' => 'Usermgmt')); ?>
    </div>
</div>
<?php endif; ?>