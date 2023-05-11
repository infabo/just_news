<?php

(static function (): void {
    $frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
    $languageFilePrefix = 'LLL:EXT:just_news/Resources/Private/Language/locallang_be.xlf:';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            $languageFilePrefix . 'CType.news_list',
            'NewsList',
            'apps-pagetree-justnews'
        ],
        'uploads',
        'after'
    );

    $GLOBALS['TCA']['tt_content']['types']['NewsList'] = [
        'showitem' => '
        --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.header;header,
        --div--;' . $languageFilePrefix . 'div.news,
        pi_flexform;' . $languageFilePrefix . 'CType.NewsList.flexform_pi,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.visibility;visibility,
        --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
        --div--;' . $frontendLanguageFilePrefix . 'tabs.extended,rowDescription,
        --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories'
    ];

    $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['NewsList'] = 'apps-pagetree-justnews';

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['NewsList'] = 'recursive,select_key,pages';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['NewsList'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '',
        'FILE:EXT:just_news/Configuration/FlexForm/NewsList.xml',
        'NewsList'
    );
})();
