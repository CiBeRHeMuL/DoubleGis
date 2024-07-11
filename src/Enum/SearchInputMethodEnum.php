<?php

namespace AndrewGos\DoubleGis\Enum;

enum SearchInputMethodEnum: string
{
    case HardwareQwertyKeyboard = 'hardware_qwerty_keyboard'; // физическая QWERTY-клавиатура
    case OnScreenKeyboard = 'on_screen_keyboard'; // экранная touch screen клавиатура
    case Voice = 'voice'; // голосовой ввод
    case HandWriting = 'hand_writing'; // рукописный ввод
    case Scanning = 'scanning'; // ввод который используется людьми с ограниченными возможностями. C помощью пальца или глазными движениями
    case SoftwareGenerated = 'software_generated'; // текст сгенерирован програмным обеспечением
    case Other = 'other'; // прочие типы ввода
}
