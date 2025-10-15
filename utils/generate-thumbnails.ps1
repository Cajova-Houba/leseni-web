
# Set variables
$magickExecutable = "magick"  # Ensure ImageMagick is in your PATH
$inputFolder = "..\src\images\gallery\"
$outputFolder = "..\src\images\thumbnails\"
$scale = "25%"

# Create output folder if it doesn't exist
if (!(Test-Path $outputFolder)) {
    New-Item -ItemType Directory -Path $outputFolder | Out-Null
}


# Get all image files (jpg, png, etc.) from input folder
$imageFiles = Get-ChildItem -Path $inputFolder -File

foreach ($file in $imageFiles) {
    Write-Output "Processing $($file.Name)..."
    $inputImage = $file.FullName
    $outputImage = Join-Path $outputFolder $file.Name

    # Use ImageMagick to resize the image
    & $magickExecutable `"$inputImage`" -resize $scale `"$outputImage`"
}