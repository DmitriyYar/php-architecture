<?php

interface IMarkdown
{
    public function render(): string;
}

class HtmlRender implements IMarkdown
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return htmlspecialchars($this->text);
    }
}


abstract class Decorator implements IMarkdown
{
    protected $content = null;

    public function __construct(IMarkdown $content)
    {
        $this->content = $content;
    }
}

class Bold extends Decorator
{
    public function render(): string
    {
        return '<b>' . str_replace('**', '', $this->content->render()) . '</b>';
    }
}

class Italic extends Decorator
{
    public function render(): string
    {
        return '<i>' . str_replace('**', '', $this->content->render()) . '</i>';
    }
}

class Header3 extends Decorator
{
    public function render(): string
    {
        return '<h3 style="color:red">' . str_replace('####', '', $this->content->render()) . '</h3>';
    }
}


class Header4 extends Decorator
{
    public function render(): string
    {
        return '<h4 style="color:green">' . str_replace('####', '', $this->content->render()) . '</h4>';
    }
}

function testDecorator1(string $text)
{
    $htmlRender =
        new Bold(
            new Header4(
                new HtmlRender($text)
            )
        );
    return $htmlRender->render();
}

function testDecorator2(string $text)
{
    $htmlRender =
        new Bold(
            new Italic(
                new Header3(
                    new HtmlRender($text)
                )
            )
        );
    return $htmlRender->render();
}

$message1 = testDecorator1('Сообщение 1');
$message2 = testDecorator2('Сообщение 2');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decorator</title>
</head>

<body>
<h2>Паттерн Декоратор</h2>
<br>
<?= $message1 ?>
<br>
<?= $message2 ?>
</body>

</html>
