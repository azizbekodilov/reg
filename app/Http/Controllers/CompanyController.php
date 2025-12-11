<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            // Валидация основных данных
            $validatedData = $request->validate([
                'customer_service_id' => 'required|integer',
                'organisation_type' => 'required|string',
                'company_name' => 'required|string|max:255',
                'additional_company_names1' => 'nullable|string|max:255',
                'additional_company_names2' => 'nullable|string|max:255',
                'additional_company_names3' => 'nullable|string|max:255',
                'additional_company_names4' => 'nullable|string|max:255',
                'additional_company_names5' => 'nullable|string|max:255',
                'type_of_activity' => 'required|string|max:500',
                'juridical_name' => 'required|string|max:500',
                'cadastral_number' => 'required|string|max:19',
                'tax_regime' => 'required|string',
                'capital_summa' => 'required|string',
                'head_name' => 'required|string|max:255',
                'head_phone' => 'required|string|max:20',
                'head_mail' => 'nullable|email|max:255',
                'organisation_phone' => 'required|string|max:20',
                'organisation_mail' => 'nullable|email|max:255',
                'note' => 'nullable|string|max:1000',
                'founders' => 'nullable|array',
            ]);

            // Собираем дополнительные наименования
            $additionalNames = [];
            for ($i = 1; $i <= 5; $i++) {
                $name = $request->input("additional_company_names{$i}");
                if (!empty(trim($name))) {
                    $additionalNames[] = trim($name);
                }
            }

            // Подготовка данных для сохранения
            $companyData = [
                'customer_service_id' => $validatedData['customer_service_id'],
                'organisation_type' => $validatedData['organisation_type'],
                'company_name' => $validatedData['company_name'],
                'additional_company_names1' => $validatedData['additional_company_names1'],
                'additional_company_names2' => $validatedData['additional_company_names2'],
                'additional_company_names3' => $validatedData['additional_company_names3'],
                'additional_company_names4' => $validatedData['additional_company_names4'],
                'additional_company_names5' => $validatedData['additional_company_names5'],
                'type_of_activity' => $validatedData['type_of_activity'],
                'juridical_name' => $validatedData['juridical_name'],
                'cadastral_number' => $validatedData['cadastral_number'],
                'tax_regime' => $validatedData['tax_regime'],
                'capital_summa' => $this->parseCapitalSumma($validatedData['capital_summa']),
                'head_name' => $validatedData['head_name'],
                'head_phone' => $validatedData['head_phone'],
                'head_mail' => $validatedData['head_mail'],
                'organisation_phone' => $validatedData['organisation_phone'],
                'organisation_mail' => $validatedData['organisation_mail'],
                'note' => $validatedData['note'],
                'founders_data' => json_encode($request->input('founders', [])),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Сохранение в базу данных (предполагается модель Company)
            // Company::create($companyData);

            return response()->json([
                'success' => true,
                'message' => 'Заявка успешно отправлена',
                'data' => [
                    'company_name' => $companyData['company_name'],
                    'additional_names_count' => count($additionalNames)
                ]
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка валидации',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при сохранении заявки',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Парсинг суммы уставного капитала
     */
    private function parseCapitalSumma(string $summa): int
    {
        return (int) str_replace([' ', ',', '.'], '', $summa);
    }

    /**
     * Получение заявки по ID
     */
    public function show($id): JsonResponse
    {
        try {
            // $company = Company::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    // Данные компании
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Заявка не найдена'
            ], 404);
        }
    }
}
