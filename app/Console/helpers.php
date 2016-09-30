<?php

function markdown($markdown)
{
    return app(ParsedownExtra::class)->text($markdown);
}