<?php
// ============================================
// INSTALADOR AUTOMÁTICO - M33 Sistemas
// ============================================

echo "<h1>🚀 Instalador da Estrutura</h1>";

// 1. Cria a pasta logs na raiz
$pasta_logs = __DIR__ . '/logs';
if (!file_exists($pasta_logs)) {
    mkdir($pasta_logs, 0755, true);
    echo "✅ Pasta <strong>logs</strong> criada com sucesso!<br>";
} else {
    echo "ℹ️ Pasta <strong>logs</strong> já existe.<br>";
}

// 2. Cria a pasta admin
$pasta_admin = __DIR__ . '/admin';
if (!file_exists($pasta_admin)) {
    mkdir($pasta_admin, 0755, true);
    echo "✅ Pasta <strong>admin</strong> criada com sucesso!<br>";
} else {
    echo "ℹ️ Pasta <strong>admin</strong> já existe.<br>";
}

// 3. Cria o arquivo logs.php DENTRO da pasta admin
$arquivo_logs = $pasta_admin . '/logs.php';
if (!file_exists($arquivo_logs)) {
    $conteudo_logs = <<<'EOD'
<?php
$arquivo_selecionado = isset($_GET['log']) ? $_GET['log'] : 'login';
$caminho_arquivo = __DIR__ . '/../logs/' . $arquivo_selecionado . '.log';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Logs M33</title>
<style>body{font-family:sans-serif;background:#1a1a2e;color:#fff;padding:20px}.container{max-width:900px;margin:0 auto;background:#16213e;padding:20px;border-radius:8px}.pre-log{background:#0f3460;padding:15px;border-radius:5px;white-space:pre-wrap;color:#0f0}</style>
</head>
<body><div class="container">
<h1>🔒 Logs de Segurança</h1>
<a href="logs.php?log=login">Login</a> | <a href="logs.php?log=acessos">Acessos</a> | <a href="logs.php?log=bloqueados">Bloqueados</a>
<h2>Visualizando: <?php echo strtoupper($arquivo_selecionado); ?>.log</h2>
<div class="pre-log"><?php
if(file_exists($caminho_arquivo)) echo htmlspecialchars(file_get_contents($caminho_arquivo));
else echo "Nenhum log encontrado ainda. Tente fazer um login errado para gerar registros.";
?></div>
</div></body></html>
EOD;
    file_put_contents($arquivo_logs, $conteudo_logs);
    echo "✅ Arquivo <strong>admin/logs.php</strong> criado com sucesso!<br>";
} else {
    echo "ℹ️ Arquivo <strong>admin/logs.php</strong> já existe.<br>";
}

echo "<br><hr><br>";
echo "<h2>🎉 Pronto! Agora teste os links abaixo:</h2>";
echo "<ul>";
echo "<li><a href='http://localhost/M.Sistemas/admin/logs.php' target='_blank'>Abrir a página de Logs</a></li>";
echo "<li><a href='http://localhost/M.Sistemas/' target='_blank'>Abrir a página inicial do site</a></li>";
echo "</ul>";
echo "<p><strong>Dica:</strong> Vá na página de Logs. Se aparecer 'Nenhum log encontrado', está perfeito! Basta ir no seu formulário de login e errar a senha de propósito para gerar o primeiro log.</p>";
?>