<h1 align='center' style='color: white'>
    Cards v3.0
</h1>

### `🆕 Introdução`

#### Os novos cards foram pensados para serem mais fáceis de controlar com o banco

### `🤔 Como usar os novos cards?`

#### `01` Primeiro não se esqueça de importar e chamar a função <span style='color: #FFED96;'>renderCards<span style='color: #FFBB00'>( )</span></span>

```php
require_once __DIR__ . "/VHS/src/views/components/cards/index.php";

use Src\Views\Components\Cards\renderCards;
```

#### `02` Passar para função um array e o tipo de card como paramêtros para ele analisar os dados

```php
<div id='divResponsiva'>
  renderCards($videos, 'videos');
  renderCards($events, 'events');
  renderCards($mychannel, 'mychannel');
  renderCards($channels, 'channels');
</div>
```

#### Isso já é suficiente para renderizar seus cards na página baseado nos dados recebidos da view.

### `👨‍🏫 Código explicado:`

#### A classe <span style='color: yellowgreen'>Cards</span> contém os todos os atributos de um card

<br>
<h4 align='center'>
    Feito com ❤ por <code>@zuiaas</code>
</h4>