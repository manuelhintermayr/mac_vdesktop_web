<?php
// === Simple Markdown to HTML converter for README.md ===

function markdownToHtml($markdownText)
{    // Remove HTML comments
    $html = preg_replace('/<!--.*?-->/s', '', $markdownText);

    // Convert horizontal rules FIRST (before other processing)
    $html = preg_replace('/^---+\s*$/m', '<hr>', $html);
    $html = preg_replace('/^\s*---+\s*$/m', '<hr>', $html);

    // Convert headers
    $html = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $html);
    $html = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $html);
    $html = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $html);

    // Convert bold text
    $html = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $html);

    // Convert italic text
    $html = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $html);

    // Convert inline code
    $html = preg_replace('/`(.+?)`/', '<code>$1</code>', $html);    // Convert images BEFORE links (important order!)
    $html = preg_replace('/!\[([^\]]*)\]\(([^)]+)\)/', '<img src="$2" alt="$1" style="max-width: 100%; height: auto;" />', $html);
    // Convert links
    $html = preg_replace('/\[(.+?)\]\((.+?)\)/', '<a href="$2" target="_blank">$1</a>', $html);    // Convert blockquotes
    $html = preg_replace('/^> (.+)$/m', '<blockquote>$1</blockquote>', $html);

    // Convert lists (process before line breaks)
    $html = convertLists($html);

    // Convert emojis to Unicode (basic ones)
    $emojiMap = [
        '🧭' => '🧭',
        '🏫' => '🏫',
        '🚨' => '🚨',
        '👉' => '👉',
        '💻' => '💻',
        '🧪' => '🧪',
        '🚀' => '🚀',
        '🔗' => '🔗',
        '⚖️' => '⚖️',
        '📜' => '📜',
        '❤️' => '❤️'
    ];

    foreach ($emojiMap as $emoji => $unicode) {
        $html = str_replace($emoji, $unicode, $html);
    }    // Convert line breaks to <br> and paragraphs
    $lines = explode("\n", $html);
    $result = '';
    $inBlockquote = false;
    $inList = false;

    foreach ($lines as $line) {
        $line = trim($line);

        if (empty($line)) {
            if (!$inBlockquote && !$inList) {
                $result .= "</p><p>";
            }
        } else if (strpos($line, '<ul>') === 0) {
            $inList = true;
            $result .= "</p>" . $line;
        } else if (strpos($line, '</ul>') === 0) {
            $inList = false;
            $result .= $line . "<p>";
        } else if (strpos($line, '<li>') === 0) {
            $result .= $line;
        } else if (strpos($line, '<h') === 0 || strpos($line, '<hr>') !== false || strpos($line, '<hr') === 0 || strpos($line, '<img') === 0) {
            $result .= "</p>" . $line . "<p>";
        } else if (strpos($line, '<blockquote>') === 0) {
            $inBlockquote = true;
            $result .= "</p>" . $line;
        } else if (strpos($line, '</blockquote>') !== false) {
            $inBlockquote = false;
            $result .= $line . "<p>";
        } else {
            $result .= $line . ($inBlockquote || $inList ? '' : '<br>');
        }
    }

    // Clean up empty paragraphs and add proper structure
    $result = '<div class="readme-content"><p>' . $result . '</p></div>';
    $result = preg_replace('/<p><\/p>/', '', $result);
    $result = preg_replace('/<p><br>/', '<p>', $result);
    $result = preg_replace('/<br><\/p>/', '</p>', $result);

    return $result;
}

// Function to convert Markdown lists to HTML
function convertLists($html)
{
    $lines = explode("\n", $html);
    $result = [];
    $inList = false;

    foreach ($lines as $line) {
        $trimmedLine = trim($line);

        // Check if line is a list item
        if (preg_match('/^- (.+)$/', $trimmedLine, $matches)) {
            if (!$inList) {
                $result[] = '<ul>';
                $inList = true;
            }
            $result[] = '<li>' . $matches[1] . '</li>';
        } else {
            // If we were in a list and this line is not a list item, close the list
            if ($inList) {
                $result[] = '</ul>';
                $inList = false;
            }
            $result[] = $line;
        }
    }

    // Close list if we ended while still in one
    if ($inList) {
        $result[] = '</ul>';
    }

    return implode("\n", $result);
}

// Read the README.md file
$readmePath = '../README.md';
if (file_exists($readmePath)) {
    $markdownContent = file_get_contents($readmePath);
    $htmlContent = markdownToHtml($markdownContent);    // Add reference to original source
    $sourceReference = '
    <div class="source-reference">
        <p><strong>📖 Note:</strong> This content is copied from the original README: 
        <a href="https://github.com/manuelhintermayr/mac_vdesktop_web/blob/main/README.md" target="_blank">
        here
        </a></p>
        <hr>
    </div>';

    // Add some custom styling
    $styledContent = '
    <style>
        .readme-content {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            line-height: 1.6;
            padding: 20px;
            padding-top: 0;
            color: #333;
        }
        .readme-content h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .readme-content h2 {
            color: #34495e;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        .readme-content h3 {
            color: #7f8c8d;
            margin-top: 25px;
            margin-bottom: 10px;
        }        .readme-content blockquote {
            border-left: 4px solid #3498db;
            margin: 15px 0;
            padding: 10px 15px;
            background-color: #f8f9fa;
            font-style: italic;
        }
        .readme-content ul {
            margin: 15px 0;
            padding-left: 30px;
        }
        .readme-content li {
            margin: 8px 0;
            line-height: 1.6;
        }
        .readme-content code {
            background-color: #f1f2f6;
            padding: 2px 4px;
            border-radius: 3px;
            font-family: "Monaco", "Consolas", monospace;
        }
        .readme-content a {
            color: #3498db;
            text-decoration: none;
        }
        .readme-content a:hover {
            text-decoration: underline;
        }
        .readme-content hr {
            border: none;
            border-top: 1px solid #bdc3c7;
            margin: 25px 0;
        }        .readme-content img {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin: 15px auto;
            display: block;
            max-width: 90%;
            height: auto;
        }
        .source-reference {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 15px;
            font-size: 14px;
        }
        .source-reference p {
            margin: 0;
            color: #495057;
        }
        .source-reference a {
            color: #007bff;
            text-decoration: none;
            word-break: break-all;
        }
        .source-reference a:hover {
            text-decoration: underline;
        }
        .source-reference hr {
            margin: 15px 0 0 0;
            border-top: 1px solid #dee2e6;
        }
    </style>
    ' . $sourceReference . $htmlContent;

    echo $styledContent;
} else {
    echo '<div style="padding: 20px; text-align: center; color: #e74c3c;">            <h3>README.md not found</h3>
            <p>The README.md file could not be loaded.</p>
          </div>';
}
?>
