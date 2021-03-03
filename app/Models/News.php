<?php


namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @property array $list
 **/
class News
{
    const FILE_NAME = '/news.json';
    protected int $lastInsertId = 1;

    public function getLastInsertId(): int {
        return $this->lastInsertId;
    }
    /** @todo найти как замокать функцию в тестах */
    public function findAll(): array {
        $filePath = $this->getFilePath();

        if (File::exists($filePath)) {
            return json_decode(File::get( $filePath ), true);
        }
        return [];
    }

    public function findOne(int $id): ?array {
        return $this->findAll()[$id] ?? [];
    }

    public function findBy(string $key, int $value): array {
        return Arr::where($this->findAll(), function ($item) use ($key, $value) {
            if (!isset($item[$key])) {
                return false;
            }
            return $item[ $key ] === $value;
        });
    }

    private function getFilePath(): string {
        return storage_path() . self::FILE_NAME;
    }

    /** @todo найти как замокать функцию в тестах */
    public function save(array $data) {
        $newsData = $this->findAll();
        $data['category_id'] = (int)$data['category_id'];
        $data['is_private'] = isset($data['is_private']);
        $data['id'] = count($newsData) + 1;
        $newsData[ $data['id'] ] = $data;

        $isSaved = File::put($this->getFilePath(), json_encode($newsData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) );

        if (!$isSaved) {
            throw new FileException();
        }

        $this->lastInsertId = $data['id'];
    }
}
