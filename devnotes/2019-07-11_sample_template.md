## 2019-07-11 Sameple Template

Initial sample template for now

```json
{
  "name": "Dental Records",
  "description": "Dental Clinic Records description",
  "is_active": 1,
  "location": "sidebar",
  "form_values": [
    {
      "label": "First Name",
      "type": "short_answer",
      "is_required": true
    },
    {
      "label": "Last Name",
      "type": "short_answer",
      "is_required": true
    },
    {
      "label": "Gender",
      "type": "dropdown",
      "is_required": false,
      "options": [
        "Male",
        "Female"
      ]
    },
    {
      "label": "Dental History",
      "type": "checkbox",
      "is_required": false,
      "options": [
        "Did you have cleaning?",
        "Did you have dental surgery for the past 6 months?",
        "Are you allergic to Antibiotics?"
      ]
    },
    {
      "label": "When was your last dental appointment?",
      "type": "long_answer",
      "is_required": true
    }
  ]
}
```