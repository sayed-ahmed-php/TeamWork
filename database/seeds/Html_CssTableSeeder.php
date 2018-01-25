<?php

use Illuminate\Database\Seeder;

class Html_CssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('html_csses') -> insert([
            [
                'question' => 'Awebpage displays a picture. What﻿﻿﻿ ﻿﻿tag ﻿﻿﻿﻿﻿was used to display that picture?',
                'A' => 'picture',
                'B' => 'image',
                'C' => 'img',
                'D' => 'src',
                'answer' => 'C'
            ],[
                'question' => '<b> tag makes the enclosed text bold. What is other tag to make text bold?',
                'A' => '<strong>',
                'B' => '<dar>',
                'C' => '<black>',
                'D' => '<emp>',
                'answer' => 'A'
            ],[
                'question' => 'Tags and text that are not directly displayed on the page are written in _____ section.',
                'A' => '<html>',
                'B' => '<head>',
                'C' => '<title>',
                'D' => '<body>',
                'answer' => 'B'
            ],[
                'question' => 'Which tag inserts a line horizontally on your web page?',
                'A' => '<hr>',
                'B' => '<line>',
                'C' => '<line direction="horizontal">',
                'D' => '<tr>',
                'answer' => 'A'
            ],[
                'question' => 'What should be the first tag in any HTML document?',
                'A' => '<head>',
                'B' => '<title>',
                'C' => '<html>',
                'D' => '<document>',
                'answer' => 'C'
            ],[
                'question' => 'Which tag allows you to add a row in a table?',
                'A' => ' <td> and </td>',
                'B' => '<cr> and </cr>',
                'C' => '<th> and </th>',
                'D' => '<tr> and </tr>',
                'answer' => 'D'
            ],[
                'question' => 'How can you make a bulleted list?',
                'A' => '<list>',
                'B' => '<nl>',
                'C' => '<ul>',
                'D' => '<ol>',
                'answer' => 'C'
            ],[
                'question' => 'How can you make a numbered list?',
                'A' => '<dl>',
                'B' => '<ol>',
                'C' => '<list>',
                'D' => '<ul>',
                'answer' => 'B'
            ],[
                'question' => 'Where can you find best quality multiple choice questions?',
                'A' => 'icttrends.com',
                'B' => 'psexam.com',
                'C' => 'prepare.icttrends.com',
                'D' => 'mcqsets.com',
                'answer' => 'D'
            ],[
                'question' => 'How can you make an e-mail link?',
                'A' => '<a href="xxx@yyy">',
                'B' => '<mail href="xxx@yyy">',
                'C' => '<mail>xxx@yyy</mail>',
                'D' => '<a href="mailto:xxx@yyy">',
                'answer' => 'A'
            ],[
                'question' => 'What is the correct HTML for making a hyperlink?',
                'A' => '<a href="http:// mcqsets.com">ICT Trends Quiz</a>',
                'B' => '<a name="http://mcqsets.com">ICT Trends Quiz</a>',
                'C' => '<http://mcqsets.com</a>',
                'D' => 'url="http://mcqsets.com">ICT Trends Quiz',
                'answer' => 'D'
            ],[
                'question' => 'Choose the correct HTML tag to make a text italic',
                'A' => '<ii>',
                'B' => '<italics>',
                'C' => '<italic>',
                'D' => '<i>',
                'answer' => 'A'
            ],[
                'question' => 'Choose the correct HTML tag to make a text bold?',
                'A' => '<b>',
                'B' => '<bold>',
                'C' => '<bb>',
                'D' => '<bld>',
                'answer' => 'B'
            ],[
                'question' => 'What is the correct HTML for adding a background color?',
                'A' => '<body color="yellow">',
                'B' => '<body bgcolor="yellow">',
                'C' => '<background>yellow</background>',
                'D' => '<body background="yellow">',
                'answer' => 'B'
            ],[
                'question' => 'Choose the correct HTML tag for the smallest size heading?',
                'A' => '<heading>',
                'B' => '<h6>',
                'C' => '<h1>',
                'D' => '<head>',
                'answer' => 'A'
            ],[
                'question' => 'What is the correct HTML tag for inserting a line break?',
                'A' => '<br>',
                'B' => '<lb>',
                'C' => '<break>',
                'D' => '<newline>',
                'answer' => 'A'
            ],[
                'question' => 'What doesvlink attribute mean?',
                'A' => 'visited link',
                'B' => 'virtual link',
                'C' => 'very good link',
                'D' => 'active link',
                'answer' => 'B'
            ],[
                'question' => 'Which attribute is used to name an element uniquely?',
                'A' => 'class',
                'B' => 'id',
                'C' => 'dot',
                'D' => 'all of above',
                'answer' => 'B'
            ],[
                'question' => 'Which tag creates a check box for a form in HTML?',
                'A' => '<checkbox>',
                'B' => '<input type="checkbox">',
                'C' => '<input=checkbox>',
                'D' => '<input checkbox>',
                'answer' => 'A'
            ],[
                'question' => 'To create a combo box (drop down box) which tag will you use?',
                'A' => '<select>',
                'B' => '<list>',
                'C' => '<input type="dropdown">',
                'D' => 'all of above',
                'answer' => 'D'
            ],[
                'question' => 'Which of the following is not a pair tag?',
                'A' => '<p>',
                'B' => '< u >',
                'C' => '<i>',
                'D' => '<img>',
                'answer' => ''
            ],[
                'question' => 'To create HTML document you requirea',
                'A' => 'web page editing software',
                'B' => 'High powered computer',
                'C' => 'Just a notepad can be used',
                'D' => 'None of above',
                'answer' => 'C'
            ],[
                'question' => 'The special formatting codes in HTML document used to present contentare',
                'A' => 'tags',
                'B' => 'attributes',
                'C' => 'values',
                'D' => 'None of above',
                'answer' => 'A'
            ],[
                'question' => 'HTML documents are saved in',
                'A' => 'Special binary format',
                'B' => 'Machine language codes',
                'C' => 'ASCII text',
                'D' => 'None of above',
                'answer' => 'C'
            ],[
                'question' => 'Some tags enclose the text. Those tags are known as',
                'A' => 'Couple tags',
                'B' => 'Single tags',
                'C' => 'Double tags',
                'D' => 'Pair tags',
                'answer' => 'D'
            ],[
                'question' => 'The _____ character tells browsers to stop tagging the text',
                'A' => '?',
                'B' => '/',
                'C' => '>',
                'D' => '%',
                'answer' => 'B'
            ],[
                'question' => 'In HTML document the tags',
                'A' => 'Should be written in upper case',
                'B' => 'should be written in lower case',
                'C' => 'should be written in propercase',
                'D' => 'can be written in both uppercase or lowercase',
                'answer' => 'D'
            ],[
                'question' => 'Marquee is a tag in HTML to',
                'A' => 'mark the list of items to maintaininqueue',
                'B' => 'Mark the text so that it is hidden in browser',
                'C' => 'Display text with scrolling effect',
                'D' => 'None of above',
                'answer' => 'C'
            ],[
                'question' => 'There are ____ different of heading tags in HTML',
                'A' => '4',
                'B' => '5',
                'C' => '6',
                'D' => '7',
                'answer' => 'C'
            ],[
                'question' => 'To create a blank line in your web page',
                'A' => 'press Enter two times',
                'B' => 'press Shift + Enter',
                'C' => 'insert <BR> tag',
                'D' => 'insert <BLINE>',
                'answer' => 'C'
            ],[
                'question' => 'Which of the following is not a style tag?',
                'A' => '<b>',
                'B' => '<tt>',
                'C' => '<i>',
                'D' => 'All of above are style tags',
                'answer' => 'D'
            ],[
                'question' => 'The way the browser displays the object can be modified by _____',
                'A' => 'attributes',
                'B' => 'parameters',
                'C' => 'modifiers',
                'D' => 'None of above',
                'answer' => 'A'
            ],[
                'question' => 'Which of the following HTML code is valid?',
                'A' => '<font colour="red">',
                'B' => '<font color="red">',
                'C' => '<red><font>',
                'D' => 'All of above are style tags',
                'answer' => 'B'
            ],[
                'question' => 'Which of the following is an attribute related to font tag?',
                'A' => 'size',
                'B' => 'face',
                'C' => 'color',
                'D' => 'All of above are style tags',
                'answer' => 'D'
            ],[
                'question' => 'HTML supports',
                'A' => 'ordered lists',
                'B' => 'unordered lists',
                'C' => 'both type of lists',
                'D' => 'does not support those types',
                'answer' => 'C'
            ],[
                'question' => 'What tag is used to list individual items of an ordered list?',
                'A' => 'LI',
                'B' => 'OL',
                'C' => 'UL',
                'D' => 'None of above',
                'answer' => 'A'
            ],[
                'question' => 'When should you use path along with file name of picture in IMG tag?',
                'A' => 'path is optional and not necessary',
                'B' => 'when the location of image file andhtml file are different',
                'C' => 'when image file and html file both are on same location',
                'D' => 'path is always necessary when inserting image',
                'answer' => 'B'
            ],[
                'question' => 'Which of the following is not a valid alignment attribute?',
                'A' => 'Left',
                'B' => 'Right',
                'C' => 'Top',
                'D' => 'All of above',
                'answer' => 'C'
            ],[
                'question' => 'Which attribute is used withimg tag to display the text if image could not load in browser?',
                'A' => 'description',
                'B' => 'name',
                'C' => 'alt',
                'D' => 'id',
                'answer' => 'C'
            ],[
                'question' => 'Which attribute can be used with BODY tag to set background color green?',
                'A' => 'background="green"',
                'B' => 'bgcolor="green"',
                'C' => 'vlink="green"',
                'D' => 'None of above',
                'answer' => 'B'
            ],[
                'question' => 'Which attribute you will use with TD tag to merge two cells horizontally?',
                'A' => 'merge=colspan2',
                'B' => 'rowspan=2',
                'C' => 'colspan=2',
                'D' => 'merge=row2',
                'answer' => 'C'
            ]
        ]);
    }
}
