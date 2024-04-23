<?php

/**
 * The page creator page controller
 */
class Page_creatorController extends Page_creatorModel
{
    function __construct()
    {
    }

    public function createFile($filePath, $filecotent)
    {
        if (file_exists($filePath)) {
            echo "</br>Page may already exists";
            return;
        }
        $myfile = fopen($filePath, "x") or die("Unable to open file!");
        $content = $filecotent;
        fwrite($myfile, $content);
        fclose($myfile);
    }

    public function createPage($fileName)
    {
        $fileNameUCFirst = ucfirst($fileName);

        $filePathForController = "Controllers/" . $fileName . "_controller.php";
        $fileContentForController = "<?php class " . $fileNameUCFirst . "Controller extends " . $fileNameUCFirst . "Model{function __construct(){}}";
        $this->createFile($filePathForController, $fileContentForController);

        $filePathForModel = "Models/" . $fileName . "_model.php";
        $fileContentForModel = "<?php class " . $fileNameUCFirst . "Model extends Dbh{function __construct(){}}";
        $this->createFile($filePathForModel, $fileContentForModel);

        $filePathForView = "Views/" . $fileName . "_view.php";
        $fileContentForView = "<?php class " . $fileNameUCFirst . "View extends " . $fileNameUCFirst . "Model{private \$controller;function __construct(\$controller){\$this->controller=\$controller;}public function render(){include_once('Templates/" . $fileName . "/" . $fileName . "_template.php');}}";
        $this->createFile($filePathForView, $fileContentForView);

        if (!file_exists("Templates/" . $fileName)) {
            mkdir("Templates/" . $fileName, 0777, true);
        } else {
            echo "</br>Folder in Template may already exists";
        }

        $filePathForTemplate = "Templates/" . $fileName . "/" . $fileName . "_template.php";
        $fileContentForTemplate = "<!doctype html><html><head><title>" . $fileNameUCFirst . "</title></head><body><h1>" . $fileNameUCFirst . "</h1><p>This is the " . $fileNameUCFirst . " page content.</p><script src='../Assets/js/ajax-handler.js'></script></body></html>";
        $this->createFile($filePathForTemplate, $fileContentForTemplate);
    }

    public function deletePage($fileName)
    {
        $filesToDelete = [
            "Controllers/" . $fileName . "_controller.php",
            "Models/" . $fileName . "_model.php",
            "Views/" . $fileName . "_view.php",
            "Templates/" . $fileName . "/" . $fileName . "_template.php",
        ];

        foreach ($filesToDelete as $file) {
            if (file_exists($file)) {
                if (unlink($file)) {
                    echo "File '$file' deleted successfully.</br></br>";
                } else {
                    echo "</br>Error: Unable to delete file '$file'.</br></br>";
                }
            } else {
                echo "</br>Warning: File '$file' does not exist.</br></br>";
            }
        }

        $templateDirectoryPath = "Templates/" . $fileName;

        if (file_exists($templateDirectoryPath) && is_dir($templateDirectoryPath)) {
            if (rmdir($templateDirectoryPath)) {
                echo "Template directory deleted successfully.";
            } else {
                echo "Error: Template directory could not be deleted.";
            }
        } else {
            echo "Error: Template directory does not exist.";
        }
    }
}
