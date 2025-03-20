function insertNapisdy()
{
    $json = file_get_contents("/json/napisy.json");
    $data = json_decode($json, true);
}